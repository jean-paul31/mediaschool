const userDb = require('../db/userDb.js');
const tchat = require('../db/tchatDb.js');
const messageDb = require('../db/messageDb.js');

// const getMessageUsers = async (req, res) => {
//     const { userId } = req.params;
//     const result = await messageDb.getMessageUsers();
//     res.status(200).render('pages/messages', { messages: result.rows});
// }
const getMessageUser = async (req, res) => {
    try {
        const { userId } = req.params;
        const { search } = req.query
        const result = await tchat.getUsers_sender(userId);
        const surname = await messageDb.getMessageUserName(userId)
        res.status(200).render('pages/messages', { userId: userId, messages: result.rows, search: search, surname: surname.rows[0] });
        if (!result) {
            throw new Error("Erreur lors de la récupération des message.");
        }
        if (!surname) {
            throw new Error("Erreur lors de la récupération des utilisateurs.");
        }
    } catch (error) {
        console.error("Une erreur s'est produite :", error);
        res.status(500).send("Une erreur s'est produite lors du traitement de votre demande.");
    }
};

const putMessageUser = async (req, res) => {
    const { userId } = req.params;    
    const user = await userDb.getUser(userId);
    const { id_receiver, title, content, password } = req.body;
    if (user.rows[0].password == password) {
        const insert = await messageDb.insertMessageUser(userId, id_receiver, title, content);
        res.status(200).send('Insertion OK' );
    } else {
        res.status(403).send('vous n\'etes pas autoriser à poster un message');
    }
    
     
};
const deleteMessageUser = async (req, res) => {
    const { userId } = req.params;    
    const deleted = await messageDb.deleteMessageUser(userId);
    res.status(200).send('suppresion OK');
};

const messageController = {
    // getMessageUsers,
    getMessageUser,
    putMessageUser,
    deleteMessageUser
};

module.exports = messageController;