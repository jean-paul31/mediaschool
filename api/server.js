const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const mysql = require('mysql2');
require('dotenv').config();


// Vérifier les variables d'environnement
// if (!process.env.SERVERNAME || !process.env.USERNAME || !process.env.PASSWORD) {
//   console.error('Les variables d\'environnement ne sont pas définies correctement.');
//   process.exit(1); // Arrêter le serveur si les variables sont manquantes
// }

const app = express();
const server = http.createServer(app);
const io = new Server(server);

// Connexion à la base de données MySQL
const db = mysql.createConnection({
  host: 'localhost',
  user: 'adminJP', // Remplace par ton utilisateur MySQL
  password: 'JpCb2009*!!', // Remplace par ton mot de passe MySQL
  database: 'mediaschool' // Remplace par ton nom de base de données
});

db.connect((err) => {
  if (err) {
    console.error('Erreur de connexion à la base de données:', err);
    return;
  }
  console.log('Connecté à la base de données MySQL');
});

// Route pour afficher le chat entre l'émetteur et le récepteur
app.get('/chat', (req, res) => {
  const senderId = req.query.sender;
  const receiverId = req.query.receiver;

  if (!senderId || !receiverId) {
    return res.status(400).send('Les IDs des utilisateurs sont requis');
  }

  // Récupérer les informations des utilisateurs
  db.query('SELECT id, name, surname FROM users WHERE id = ?', [senderId], (err, sender) => {
    if (err || sender.length === 0) {
      return res.status(500).send("Erreur lors de la récupération de l'utilisateur émetteur");
    }

    db.query('SELECT id, name, surname FROM users WHERE id = ?', [receiverId], (err, receiver) => {
      if (err || receiver.length === 0) {
        return res.status(500).send('Erreur lors de la récupération du récepteur');
      }

      // Retourner une page HTML avec le chat
      res.send(`
        <html>
          <head>
            <title>Chat entre ${sender[0].surname} et ${receiver[0].surname}</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
              body, html {
                height: 100%;
                margin: 0;
                display: flex;
                flex-direction: column;
              }

              .container {
                flex: 1;
                display: flex;
                flex-direction: column;
                max-height: 100%;
              }

              #messages {
                list-style-type: none;
                padding: 0;
                flex: 1;
                overflow-y: auto;
                margin-bottom: 20px;
              }

              #messages li {
                padding: 10px;
                background-color: #f0f0f0;
                margin-bottom: 5px;
                border-radius: 5px;
              }

              #messages li.sent {
                text-align: right;
                background-color: #d1ffd1;
              }

              #form {
                display: flex;
                gap: 10px;
                position: sticky;
                bottom: 0;
                background-color: white;
                padding: 10px;
                border-top: 1px solid #ddd;
              }

              #input {
                flex: 1;
              }
            </style>
          </head>
          <body>
            <div class="container">
              <h1>Chat entre ${sender[0].surname} et ${receiver[0].surname}</h1>
              <ul id="messages"></ul>
              <form id="form">
                <input id="input" autocomplete="off" placeholder="Tapez un message..." class="form-control" />
                <button type="submit" class="btn btn-primary">Envoyer</button>
              </form>
            </div>
            <script src="/socket.io/socket.io.js"></script>
            <script>
              const socket = io();
              const senderId = ${sender[0].id};
              const receiverId = ${receiver[0].id};
              const senderName = "${sender[0].surname}";
              const receiverName = "${receiver[0].surname}";
              const messages = document.getElementById('messages');
              const form = document.getElementById('form');
              const input = document.getElementById('input');

              // Joindre une room spécifique
              socket.emit('joinRoom', { userId: senderId });

              // Empêcher le rechargement de la page
              form.addEventListener('submit', (e) => {
                e.preventDefault();

                if (input.value.trim()) {
                  const message = input.value.trim();
                  // Envoyer le message au serveur
                  socket.emit('message', { sender: senderId, receiver: receiverId, message });

                  // Ajouter le message dans l'interface utilisateur
                  const li = document.createElement('li');
                  li.classList.add('sent');
                  li.textContent = 'Vous: ' + message;
                  messages.appendChild(li);
                  messages.scrollTop = messages.scrollHeight;

                  // Vider le champ de saisie
                  input.value = '';
                }
              });

              // Recevoir les messages
              socket.on('message', (data) => {
                const li = document.createElement('li');
                li.textContent = data.senderName + ': ' + data.message;
                if (data.sender === senderId) li.classList.add('sent');
                messages.appendChild(li);
                messages.scrollTop = messages.scrollHeight;
              });
            </script>
          </body>
        </html>
      `);
    });
  });
});

// Créez un objet pour suivre le nombre de messages non lus pour chaque utilisateur
let unreadMessages = {};

io.on('connection', (socket) => {
  console.log('Un utilisateur est connecté');

  // Joindre une room
  socket.on('joinRoom', ({ userId }) => {
    socket.join(`user_${userId}`);
    console.log(`Utilisateur ${userId} a rejoint sa room`);
  });

  socket.on('message', ({ sender, receiver, message }) => {
    console.log('Message envoyé à', receiver); 
    const sanitizedMessage = message.replace(/</g, "&lt;").replace(/>/g, "&gt;"); // Échapper les balises HTML

    // Requête pour récupérer le surname du sender
    db.query('SELECT surname FROM users WHERE id = ?', [sender], (err, results) => {
      if (err || results.length === 0) {
        console.error('Erreur lors de la récupération du sender:', err);
        return;
      }

      const senderName = results[0].surname;

      // Envoyer le message au récepteur
      io.to(`user_${receiver}`).emit('message', {
        sender,
        receiver,  // Passer l'ID du récepteur pour activer le badge
        senderName, // Utiliser le surname récupéré
        message: sanitizedMessage
      });

      // Suivre le nombre de messages non lus pour chaque utilisateur
      unreadMessages[receiver] = (unreadMessages[receiver] || 0) + 1;

      // Émettre l'événement pour afficher le badge avec le nombre de messages non lus
      io.to(`user_${receiver}`).emit('showBadge', unreadMessages[receiver]);
    });
  });
});



// Démarrer le serveur
const PORT = 3000;
server.listen(PORT, () => {
  console.log(`Serveur en écoute sur http://localhost:${PORT}`);
});
