const meteoService = require('../service/meteo');

const hello = (req, res) => {
    res.status(200).send("Hello World!");
};

const templatedPage = (req, res) => {
    let users = [
        { name: "Bob", age: 24 },
        { name: "Benjamin", age: 31 }, 
        { name: "Mehdi", age: 28 }
    ];
    res.status(200).render('pages/index', { users });
};

const getMeteo = async (req, res) => {
    try {
        const { city } = req.params;
        const meteoJson = await meteoService.getCityMeteo(city);
        const meteoCity = JSON.parse(meteoJson);
        res.status(200).render("pages/meteo", { meteoCity });
    } catch (error) {
        console.error(error);
        res.status(500).send('Internal Server Error');
    }
};

const helloController ={ // a partir d'ici on exporte les methodes faitent plus haut
    hello,
    templatedPage,
    getMeteo
};

module.exports = helloController;