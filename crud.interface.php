<?php
interface Icrud{
    public function create($nom, $prenom, $id_trancheAge, $sexe, $situationMatrimoniale, $id_statut, $id_quartier);
    public function update($matricule, $nom, $prenom, $trancheAge, $sexe, $situationMatrimoniale, $statut);
    public function delete($matricule);
    public function read();
    public function afficherDetails($matricule);
}