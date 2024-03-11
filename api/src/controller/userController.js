const userDb = require('../db/userDb.js');

const getUsers = async (req, res) => {
    try {
        const result = await userDb.getUsers();
        if (!result) {
            throw new Error("Erreur lors de la récupération des utilisateurs.");
        }
        res.status(200).render("pages/users", { users: result.rows });
    } catch (error) {
        console.error("Une erreur s'est produite :", error);
        res.status(500).send("Une erreur s'est produite lors du traitement de votre demande.");
    }
};
const getUser = async (req, res) => {
    const { userId } = req.params;
    const { search, name } = req.query;
    try {
        const result = await userDb.getUser(userId);
        if (!result) {
            throw new Error("Erreur lors de la récupération des utilisateurs.");
        }
        res.status(200).render("pages/user", { users: result.rows});
    } catch (error) {
        console.error("Une erreur s'est produite :", error);
        res.status(500).send("Une erreur s'est produite lors du traitement de votre demande.");
    }
    
    
};

const putUser = async (req, res) => {
    const { userId } = req.params;    
    const { name, password } = req.body;
    const insert = await userDb.insertUser(name, password);
    res.status(200).send("Insertion OK");
};

const deleteUser = async (req, res) => {
    const { userId } = req.params;    
    const deleted = await userDb.deleteUser(userId);
    res.status(200).send("suppresion OK");
};

// const postUser = (req, res) => {
//     const { userId } = req.params;
//     const { search, name } = req.query;
//     const { ville } = req.body;
//     res.status(200).render("pages/user", { method: "POST", userId: userId, search: search, name: name, ville: ville});
// };

// const deleteUser = (req, res) => {
//     const { userId } = req.params;
//     const { search, name } = req.query;
//     const { ville } = req.body;
//     res.status(200).render("pages/user", { method: "DELETE", userId: userId, search: search, name: name,ville: ville});
// };


const userController = {
    getUsers,
    getUser,
    // postUser,
    putUser,
    deleteUser
};

module.exports = userController;