<?php

define('DSN', 'mysql:host=localhost;dbname=apprenant_db;charset=utf8');
define('USER', 'root');
define('PASSWORD', '');

try {
    $cnx = new PDO(DSN, USER, PASSWORD);
    
} catch (PDOException $erreur) {
    die('Erreur de connexion : ' . $erreur->getMessage());
}