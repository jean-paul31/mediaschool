const app = require('express')();
const server = require('http').createServer(app);
const mysql = require('mysql');
const io = require('socket.io')(server);
const { exec } = require('child_process');
const { error } = require('console');
const { stdout, stderr } = require('process');

let userAvatar;
let userSurname;
let userId;

app.set('view engine', 'ejs');

const con = mysql.createConnection({

    host: "localhost",
 
    user: "adminJP",
 
    password: "JpCb2009*!!",

    database: "mediaschool"
 
  });
    con.connect();
    app.get('/', (req, res)=>{
        con.query("SELECT * FROM `users`", function (err, result) {
            if (err) throw err;
            res.render('index', { data: result }); // Passage des données récupérées au template EJS
        });
    });

    app.get(`/user/1`, (req, res) => {
        res.send('api/public/index.ejs')
        //res.sendFile(`${__dirname}/public/index.html`);
    })

    io.on('connection', (socket) => {
        console.log('Un utilisateur s\'est connecté');

        socket.on('disconnect', () => {
            console.log('Un utilisateur s\'est déconnecté');
        });

        socket.on('chat message', (msg) => {
            io.emit('chat message', msg);
        });
    });



    const PORT = process.env.PORT || 3000;
    server.listen(PORT, ()=>{
        console.log('ecoute sur le port 3000');
    })