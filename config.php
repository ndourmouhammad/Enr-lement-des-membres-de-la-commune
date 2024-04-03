<?php
require_once("membre.class.php");
require_once("statut.class.php");
require_once("quartier.class.php");
require_once("tranche.class.php");


define('DSN', 'mysql:host=localhost;dbname=commune;charset=utf8');
define('USER', 'root');
define('PASSWORD', '');

try {
    $cnx = new PDO(DSN, USER, PASSWORD);

    // Instanciation de Membre
    $matricule="";
    $nom="";
    $prenom="";
    $id_trancheAge=0;
    $sexe="";
    $situationMatrimoniale="";
    $id_statut=0;
    $id_quartier=0;
    

    $membre = new Membre($matricule, $nom, $prenom, $id_trancheAge, $sexe, $situationMatrimoniale, $id_statut, $id_quartier, $cnx);
    $results = $membre->read();

    // Instanciation de Statut
    $libelle="";

    $statut = new Statut($cnx, $libelle);
    $statuts = $statut->getStatut();

    // Instanciation de Quartier
    $libelle_q="";

    $quartier = new Quartier($cnx, $libelle_q);
    $quartiers = $quartier->getQuartier();

    // Instanciation de TrancheAge
    $tranche="";

    $Age = new TrancheAge($cnx, $tranche);
    $ages = $Age->getAge();

} catch (PDOException $erreur) {
    die('Erreur de connexion : ' . $erreur->getMessage());
}
