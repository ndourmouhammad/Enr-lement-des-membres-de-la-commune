<?php
require_once("membre.class.php");
define('DSN', 'mysql:host=localhost;dbname=commune;charset=utf8');
define('USER', 'root');
define('PASSWORD', '');

try {
    $cnx = new PDO(DSN, USER, PASSWORD);
    $matricule="";
    $nom="";
    $prenom="";
    $trancheAge="";
    $sexe="";
    $situationMatrimoniale="";
    $statut="";
    

    $membre = new Membre($matricule, $nom, $prenom, $trancheAge, $sexe,$situationMatrimoniale, $statut, $cnx);
    $results = $membre->read();
} catch (PDOException $erreur) {
    die('Erreur de connexion : ' . $erreur->getMessage());
}
