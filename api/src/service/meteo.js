const request = require('request-promise-native');

const url = "https://www.prevision-meteo.ch/services/json/";

const getCityMeteo = async (city) => {
  try {
    return await request({ url: url + city, json: true });
  } catch (err) {
    console.log(`${err.message}`);
  }
};

module.exports = {getCityMeteo};
