const DbConnection = require('./db');

const getUsers = async () =>{
    const connexion = new DbConnection();
    return await connexion.performQuery('SELECT * FROM users;', []);
};
const getUser = async (id) =>{
    const connexion = new DbConnection();
    return await connexion.performQuery('SELECT * FROM users WHERE id = ?;', [id]);
};
const insertUser = async (name, surname, mail, mdp) =>{
    const connexion = new DbConnection();
    return await connexion.performQuery('INSERT INTO users (name, surname, mail, mdp) VALUES (?, ?, ?, ?);', [name, surname, mail, mdp]);
};
const deleteUser = async (userId) =>{
    const connexion = new DbConnection();
    return await connexion.performQuery('DELETE FROM users WHERE id=?', [userId]);
};



const userDb = {
    getUsers,
    getUser,
    insertUser,
    deleteUser
};

module.exports = userDb;