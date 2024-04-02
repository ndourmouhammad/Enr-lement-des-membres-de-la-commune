<?php
require_once("crud.interface.php");


// classe Membre
class Membre implements Icrud
     
{
    // les propriétés
    private $matricule;
    private $nom;
    private $prenom;
    private $trancheAge;
    private $sexe;
    private $situationMatrimoniale;
    private $statut;


    // la méthode magique __construct
    public function __construct($matricule, $nom, $prenom, $trancheAge, $sexe, $situationMatrimoniale, $statut)
    {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->trancheAge = $trancheAge;
        $this->sexe = $sexe;
        $this->situationMatrimoniale = $situationMatrimoniale;
        $this->statut = $statut;
    }

    // les getters et les setters
    public function getMatricule()
    {
        return $this->matricule;
    }
    public function setMatricule($n_matricule)
    {
        $this->matricule = $n_matricule;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($n_nom)
    {
        $this->nom = $n_nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($n_prenom)
    {
        $this->prenom = $n_prenom;
    }

    public function getTrancheAge()
    {
        return $this->trancheAge;
    }
    public function setTrancheAge($n_trancheAge)
    {
        $this->trancheAge = $n_trancheAge;
    }

    public function getSexe()
    {
        return $this->sexe;
    }
    public function setSexe($n_sexe)
    {
        $this->sexe = $n_sexe;
    }
    
    public function getSituationMatrimoniale()
    {
        return $this->situationMatrimoniale;
    }
    public function setSituationMatrimoniale($n_situationMatrimoniale)
    {
        $this->situationMatrimoniale = $n_situationMatrimoniale;
    }

    public function getStatut()
    {
        return $this->statut;
    }
    public function setStatut($n_statut)
    {
        $this->statut = $n_statut;
    }
 
    // Implementations des methodes de l'interface
    public function create()
    {
        
    }
    public function read()
    {
        
    }
    public function update()
    {
        
    }
    public function delete()
    {
        
    }
}