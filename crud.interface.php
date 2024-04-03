<?php
interface Icrud{
    public function create($matricule, $nom, $prenom, $trancheAge, $sexe, $situationMatrimoniale, $statut);
    public function update($matricule, $nom, $prenom, $trancheAge, $sexe, $situationMatrimoniale, $statut);
    public function delete($matricule);
    public function read();
    public function afficherDetails($matricule);
}