const DbConnection = require('./db');


const getUsers_sender = async (id) =>{
    const connexion = new DbConnection();
    return await connexion.performQuery('SELECT * FROM tchat WHERE id_sender = ?;', [id]);
};
const getUsers_receiver = async (id) =>{
    const connexion = new DbConnection();
    return await connexion.performQuery('SELECT * FROM tchat WHERE id_receiver = ?;', [id]);
};
const insertText = async (id_sender, content, id_receiver) =>{
    const connexion = new DbConnection();
    return await connexion.performQuery('INSERT INTO tchat (id_sender, content, id_receiver) VALUES (?, ?, ?);', [id_sender, content, id_receiver]);
};



const tchat = {
    getUsers_sender,
    getUsers_receiver,
    insertText
};

module.exports = tchat;