<?php

class TrancheAge {

    public $tranche;
    public $cnx;

    public function __construct($cnx, $tranche) {
        
        $this->cnx = $cnx;
        $this->tranche = $tranche;
        
    }

    public function getAge()
{
    try {
        $sql = 'SELECT * FROM TrancheAge';
        $req = $this->cnx->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $erreur) {
        die('Erreur de connexion : ' . $erreur->getMessage());
    }
}

}