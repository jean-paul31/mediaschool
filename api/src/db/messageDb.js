const DbConnection = require('./db');


const getMessageUser = async (userId) =>{
    const connexion = new DbConnection();
    return await connexion.performQuery('SELECT * FROM messages WHERE id_receiver= ? OR id_sender= ?;', [userId, userId]);
};

const getMessageUserName = async (userId) =>{
    const connexion = new DbConnection();
    return await connexion.performQuery('SELECT surname FROM users where id = ?;', [userId]);
};

const insertMessageUser = async (userId, id_receiver, title, content) =>{
    const connexion = new DbConnection();
    return await connexion.performQuery('INSERT INTO messages (id_sender, id_receiver, title, content) VALUES (?, ?, ?, ?);', [userId, id_receiver, title, content]);
};
const deleteMessageUser = async (userId) =>{
    const connexion = new DbConnection();
    return await connexion.performQuery('DELETE FROM messages WHERE id=?', [userId]);
};


const messageDb = {
    // getMessageUsers,
    getMessageUser,
    insertMessageUser,
    deleteMessageUser,
    getMessageUserName
}

module.exports = messageDb;