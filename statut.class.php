<?php

class Statut {

    public $libelle;
    public $cnx;

    public function __construct($cnx, $libelle) {
        
        $this->cnx = $cnx;
        $this->libelle = $libelle;
        
    }

    public function getStatut()
{
    try {
        $sql = 'SELECT * FROM statut';
        $req = $this->cnx->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $erreur) {
        die('Erreur de connexion : ' . $erreur->getMessage());
    }
}

}