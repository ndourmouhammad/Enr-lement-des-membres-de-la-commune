<?php

trait ValidationTrait
{

    public function validateNom($nom)
    {
        if (!empty($nom)) {
            $regex = '/^[A-Za-z\s]+$/u';
            return preg_match($regex, $nom);
        } else {
            return false; // Le champ est vide, donc invalide
        }
    }

    public function validatePrenom($prenom)
    {
        if (!empty($prenom)) {
            $regex = '/^[A-Za-z\s]+$/u';
            return preg_match($regex, $prenom);
        } else {
            return false; // Le champ est vide, donc invalide
        }
    }
}
