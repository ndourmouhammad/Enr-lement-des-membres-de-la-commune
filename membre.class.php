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
    private $cnx;


    // la méthode magique __construct
    public function __construct($matricule, $nom, $prenom, $trancheAge, $sexe, $situationMatrimoniale, $statut, $cnx)
    {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->trancheAge = $trancheAge;
        $this->sexe = $sexe;
        $this->situationMatrimoniale = $situationMatrimoniale;
        $this->statut = $statut;
        $this->cnx = $cnx;
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
    public function create($matricule, $nom, $prenom, $trancheAge, $sexe, $situationMatrimoniale, $statut)
    {
        try {
            $sql = 'INSERT INTO membre (matricule, nom, prenom, trancheAge, sexe, situationMatrimoniale, statut) VALUES(:matricule, :nom, :prenom, :trancheAge, :sexe, :situationMatrimoniale, :statut)';
            $req = $this->cnx->prepare($sql);
            $req->bindValue(':matricule', $matricule);
            $req->bindValue(':nom', $nom);
            $req->bindValue(':prenom', $prenom);
            $req->bindValue(':trancheAge', $trancheAge);
            $req->bindValue(':sexe', $sexe);
            $req->bindValue(':situationMatrimoniale', $situationMatrimoniale);
            $req->bindValue(':statut', $statut);
            $req->execute();

            header("location: index.php");
            exit();
            
        } catch (PDOException $erreur) {
            die("Erreur !: " . $erreur->getMessage() . "<br/>");
        }
    }
    public function read()
    {
     try {
        $sql="SELECT * FROM membre";
        $req=$this->cnx->prepare($sql);
        $req->execute();
        $membres = $req->fetchAll(PDO::FETCH_ASSOC);
        return $membres;
     } catch (PDOException $erreur) {
        die("Erreur !: " . $erreur->getMessage() . "<br/>");
     }   
    }
    public function update($matricule, $nom, $prenom, $trancheAge, $sexe, $situationMatrimoniale, $statut)
    {
        $sql = "UPDATE membre SET nom = :nom, prenom = :prenom, trancheAge = :trancheAge, sexe = :sexe, situationMatrimoniale = :situationMatrimoniale, statut = :statut WHERE matricule = :matricule";

        $req = $this->cnx->prepare($sql);
        $req->bindValue(':matricule', $matricule);
        $req->bindValue(':nom', $nom);
        $req->bindValue(':prenom', $prenom);
        $req->bindValue(':trancheAge', $trancheAge);
        $req->bindValue(':sexe', $sexe);
        $req->bindValue(':situationMatrimoniale', $situationMatrimoniale);
        $req->bindValue(':statut', $statut);
        $req->execute();

        header("location: index.php");
        exit();
        
    }
    public function delete()
    {
        
    }
    public function afficherDetails($matricule)
    {
        try {
            $sql="SELECT * FROM membre WHERE matricule = :matricule";
            $req=$this->cnx->prepare($sql);
            $req->bindValue(':matricule', $matricule);
            $req->execute();
            $membres = $req->fetch(PDO::FETCH_ASSOC);
            return $membres;
         } catch (PDOException $erreur) {
            die("Erreur !: " . $erreur->getMessage() . "<br/>");
         }   
    }
}