<?php

class Database {
 
    protected $_host;
    protected $_dbname;
    protected $_username;
    protected $_password;
    public static $pdo;
   
 
    public function __construct() {//$host, $dbname, $username, $password 
        
        // $this->_host = $host;
        // $this->username = $username;
        // $this->_password = $password;
        // $this->_dbname = $dbname;
        
    }
     public function getPDO() 
    {
        if (!isset(self::$pdo)) {
            try 
            {
                self::$pdo = new PDO("mysql:host=localhost; dbname=mediaschool; charset=utf8", "adminJP", "JpCb2009*!!");
                // echo self::$pdo;
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
            } 
            catch (PDOException  $e) 
            {
                die('Erreur :' . $e->getMessage());
            } {
            
            }
        }
         return self::$pdo;
    }

    public function query($statement){
       $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }

    public function prepareConnect($statement, $att1, $att2) :array{
        $reqUser = $this->getPDO()->prepare($statement);
        $reqUser->execute(array($att1, $att2));
        $userExist = $reqUser->rowCount();
        return $reqUser;
     }
 
}


