const app = require('express')();
const server = require('http').createServer(app);
const mysql = require('mysql');
const io = require('socket.io')(server);

const con = mysql.createConnection({

    host: "localhost",
 
    user: "adminJP",
 
    password: "JpCb2009*!!",

    database: "mediaschool"
 
  });
  con.connect(function(err) {
    if (err) throw err;
    console.log("Connecté à la base de données MySQL!");
    con.query("SELECT * FROM `users`", function (err, result) {
        result.forEach((result) => {
            let userAvatar = result.avatar;
            let userSurname = result.surname;
        });
    });
  });
app.get('/', (req, res)=>{
    res.sendFile(`${__dirname}/public/tchat.php`);
})
app.get(`/user/${con.id}`, (req, res) => {
    res.sendFile(`${__dirname}/public/index.html`);
})

io.on('connexion', (socket)=>{
    console.log('un utilisateur c\'est connecté');

    socket.on('disconnect', ()=>{
        console.log('un utilisateur c\'est déconnecté');
    })

    socket.on('chat message', (msg) => {
        io.emit('chat message', msg);
    })
})



server.listen(3000, ()=>{
    console.log('ecoute sur le port 3000');
})