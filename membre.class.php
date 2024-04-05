<?php
require_once("crud.interface.php");
require_once('validation.trait.php');

// classe Membre
class Membre implements Icrud

{
    use ValidationTrait;

    // les propriétés
    private $matricule;
    private $nom;
    private $prenom;
    private $id_trancheAge;
    private $sexe;
    private $situationMatrimoniale;
    private $id_statut;
    private $id_quartier;
    private $cnx;


    // la méthode magique __construct
    public function __construct($matricule, $nom, $prenom, $id_trancheAge, $sexe, $situationMatrimoniale, $id_statut, $id_quartier, $cnx)
    {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->id_trancheAge = $id_trancheAge;
        $this->sexe = $sexe;
        $this->situationMatrimoniale = $situationMatrimoniale;
        $this->id_statut = $id_statut;
        $this->id_quartier = $id_quartier;
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
        return $this->id_trancheAge;
    }
    public function setTrancheAge($n_trancheAge)
    {
        $this->id_trancheAge = $n_trancheAge;
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
        return $this->id_statut;
    }
    public function setStatut($n_statut)
    {
        $this->id_statut = $n_statut;
    }

    public function getQuartier()
    {
        return $this->id_quartier;
    }
    public function setQuartier($n_quartier)
    {
        $this->id_quartier = $n_quartier;
    }

    // Implementations des methodes de l'interface
    public function create($nom, $prenom, $id_trancheAge, $sexe, $situationMatrimoniale, $id_statut, $id_quartier)
    {
        try {
            // Insérer le nouveau membre sans spécifier le matricule
            $sql_insert = 'INSERT INTO membre (nom, prenom, id_trancheAge, sexe, situationMatrimoniale, id_statut, id_quartier) VALUES(:nom, :prenom, :trancheAge, :sexe, :situationMatrimoniale, :statut, :quartier)';
            $req_insert = $this->cnx->prepare($sql_insert);
            $req_insert->bindValue(':nom', $nom);
            $req_insert->bindValue(':prenom', $prenom);
            $req_insert->bindValue(':trancheAge', $id_trancheAge, PDO::PARAM_INT);
            $req_insert->bindValue(':sexe', $sexe);
            $req_insert->bindValue(':situationMatrimoniale', $situationMatrimoniale);
            $req_insert->bindValue(':statut', $id_statut, PDO::PARAM_INT);
            $req_insert->bindValue(':quartier', $id_quartier, PDO::PARAM_INT);
            $req_insert->execute();
    
            // Récupérer l'ID auto-incrémenté généré
            $matricule = $this->cnx->lastInsertId();
    
            // Mise à jour du matricule dans la base de données
            $sql_update = 'UPDATE membre SET matricule = :matricule WHERE id = :id';
            $req_update = $this->cnx->prepare($sql_update);
            $req_update->bindValue(':matricule', "PO_" . $matricule);
            $req_update->bindValue(':id', $matricule);
            $req_update->execute();
    
            header("location: index.php");
            exit();
        } catch (PDOException $erreur) {
            die("Erreur !: " . $erreur->getMessage() . "<br/>");
        }
    }
    
    public function read()
    {
        try {
            $sql = "SELECT * FROM membre";
            $req = $this->cnx->prepare($sql);
            $req->execute();
            $membres = $req->fetchAll(PDO::FETCH_ASSOC);
            return $membres;
        } catch (PDOException $erreur) {
            die("Erreur !: " . $erreur->getMessage() . "<br/>");
        }
    }
    public function update($matricule, $nom, $prenom, $id_trancheAge, $sexe, $situationMatrimoniale, $id_statut, $id_quartier)
    {
        try {
            $sql = "UPDATE membre SET nom = :nom, prenom = :prenom, id_trancheAge = :id_trancheAge, sexe = :sexe, situationMatrimoniale = :situationMatrimoniale, id_statut = :id_statut, id_quartier = :id_quartier WHERE matricule = :matricule";

            $req = $this->cnx->prepare($sql);
            $req->bindValue(':matricule', $matricule);
            $req->bindValue(':nom', $nom);
            $req->bindValue(':prenom', $prenom);
            $req->bindValue(':id_trancheAge', $id_trancheAge,PDO::PARAM_INT);
            $req->bindValue(':sexe', $sexe);
            $req->bindValue(':situationMatrimoniale', $situationMatrimoniale);
            $req->bindValue(':id_statut', $id_statut,PDO::PARAM_INT);
            $req->bindValue(':id_quartier', $id_quartier,PDO::PARAM_INT);
            $req->execute();

            header("location: index.php");
            exit();
        } catch (PDOException $erreur) {
            die("Erreur !: " . $erreur->getMessage() . "<br/>");
        }
    }
    public function delete($matricule)
    {
        try {
            $sql= "DELETE FROM  membre WHERE matricule =:matricule ";
            $req = $this->cnx->prepare($sql);
            $req->bindValue(':matricule', $matricule);
            var_dump($req->execute());
            $req->execute();
            
            header("location: index.php");
            exit();

        } catch (PDOException $erreur) {
            die("Erreur !: " . $erreur->getMessage() . "<br/>");
        }
    }
    public function afficherDetails($matricule)
    {
        try {
            $sql = "SELECT * FROM membre JOIN quartier ON quartier.id = id_quartier JOIN statut ON statut.id = id_statut JOIN TrancheAge ON TrancheAge.id = id_trancheAge WHERE matricule = :matricule";
            $req = $this->cnx->prepare($sql);
            $req->bindValue(':matricule', $matricule);
            $req->execute();
            $membres = $req->fetch(PDO::FETCH_ASSOC);
            return $membres;
        } catch (PDOException $erreur) {
            die("Erreur !: " . $erreur->getMessage() . "<br/>");
        }
    }
}
