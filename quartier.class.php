<?php

class Quartier {

    public $libelle_q;
    public $cnx;

    public function __construct($cnx, $libelle_q) {
        
        $this->cnx = $cnx;
        $this->libelle_q = $libelle_q;
        
    }

    public function getQuartier()
{
    try {
        $sql = 'SELECT * FROM quartier';
        $req = $this->cnx->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $erreur) {
        die('Erreur de connexion : ' . $erreur->getMessage());
    }
}

}