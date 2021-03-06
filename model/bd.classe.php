<?php
 
class Database {
 
    protected $_host;
    protected $_dbname;
    protected $_username;
    protected $_password;
    protected $pdo;
 
    public function __construct($_host = 'localhost', $_username = 'adminJP', $_password = 'JpCb2009*', $_dbname = 'mediaschool') {
        $this->_host = $_host;
        $this->username = $_username;
        $this->_password = $_password;
        $this->_dbname = $_dbname;
        
    }
     private function getPDO() 
    {
        if ($this->pdo == null) {
            try 
            {
                $pdo = new PDO('mysql:host=localhost; dbname=mediaschool', 'adminJP', 'JpCb2009*');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;
            } 
            catch (Exception $e) 
            {
                die('Erreur :' . $e->getMessage());
            } {
            
            }
        }
         return $this->pdo;
    }
    public function query($statement){
       $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }
 
}


