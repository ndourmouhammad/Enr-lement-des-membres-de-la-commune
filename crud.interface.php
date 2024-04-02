<?php
interface Icrud{
    public function create($matricule, $nom, $prenom, $trancheAge, $sexe, $situationMatrimoniale, $statut);
    public function update();
    public function delete();
    public function read();
}