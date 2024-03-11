const express = require('express');
const bodyParser = require('body-parser');
const api = require('./routes.js');

const app = express();
const port = 3001;

// Utilisez bodyParser correctement
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Utilisez les routes définies dans routes.js
app.use('/', api);

app.set('view engine', 'ejs');

app.use('/static', express.static('src/public'));

// Gestionnaire d'erreur 404
app.use((req, res) => {
    res.status(404).send('Oops, you took a wrong turn!');
});

// Gestionnaire d'erreur 500
app.use((err, req, res, next) => {
    console.error(err.stack); 
    res.status(500).send('Oops, server error!');
});

// Démarrer le serveur après la définition des gestionnaires d'erreur
app.listen(port, () => {
    console.log(`Exemple app listening on port ${port} !`);
});
