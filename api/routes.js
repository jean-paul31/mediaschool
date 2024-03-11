const express = require('express');
const router = express.Router();

const helloController =require('./src/controller/helloController.js')
const userController = require('./src/controller/userController.js');
const tchatController = require('./src/controller/tchatController.js');


const api = () => {
    router.get('/', helloController.hello);
    router.get('/templatedPage', helloController.templatedPage);

    router.get('/users', userController.getUsers);
    router.put('/user', userController.putUser);
    router.get('/user/:userId', userController.getUser);

    // router.get('/user/:userId/messages', messageController.getMessageUsers);
    router.get('/user/:userId/message', tchatController.getUsers_sender);
    router.put('/user/:userId/message', tchatController.insertText);
    // router.delete('/message/:userId', tchatController.deleteMessageUser);
    // router.delete('/user/:userId', userController.deleteUser);
    
    // router.post('/user/:userId', userController.postUser);        
    router.get('/meteo/:city', helloController.getMeteo);
    
    return router
};

module.exports = api;