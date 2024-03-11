const mysql = require('mysql');

class DbConnection {

  constructor() {
    this.connection = mysql.createConnection({
      host: 'localhost',
      user: 'adminJP',
      password: 'JpCb2009*!!',
      database: 'mediaschool'
    });
  }

  performQuery(request, values=[]) {
    return new Promise((resolve, reject) => {
      console.warn(request);
      this.connection.query(request, values, (err, rows, fields) => {
        if (err) {
          return reject(err);
        }
        return resolve({ rows, fields });
      });
    });
  }

}

module.exports = DbConnection;