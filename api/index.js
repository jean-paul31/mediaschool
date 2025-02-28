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
        if (err) 
        {
            console.error(err);
        }
        else
        {
            result.forEach((con) => {
                userAvatar =con.avatar;
                userSurname = con.surname;
                userId = con.id;
                console.log(userSurname);
            });
        }
    });
  });
app.get('/', (req, res)=>{
    exec('php public/tchat.php', (error, stdout, stderr) => {
        if (error) {
            console.error(`exec error: ${error}`);
            return;
        }
        res.send(stdout);
    })
})
app.get(`/user/1`, (req, res) => {
    res.write(tchat.php)
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




server.listen(3000, ()=>{
    console.log('ecoute sur le port 3000');
})