<?php
$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();
// identifiants nécessaires pour se connecter à la base de données
	
$servername=$_ENV['SERVERNAME'];
$dbusername=$_ENV['USERNAME'];
$dbpassword=$_ENV['PASSWORD'];
$dbnaming=$_ENV['DBNAME'];



         


