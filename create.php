<?php
require_once("config.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs soumises par le formulaire
    $matricule = htmlspecialchars($_POST['matricule']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $trancheAge = htmlspecialchars($_POST['trancheAge']);
    $sexe = htmlspecialchars($_POST['sexe']);
    $situationMatrimoniale = htmlspecialchars($_POST['situationMatrimoniale']);
    $statut = htmlspecialchars($_POST['statut']);

    if ($matricule != "" && $nom != "" && $prenom != "" && $prenom != "" && $trancheAge != "" && $sexe != "" && $situationMatrimoniale != "" && $statut != "") {
        $membre->create($matricule, $nom, $prenom, $trancheAge, $sexe, $situationMatrimoniale, $statut);
    }
}



?>
</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wmatriculeth=device-wmatriculeth, initial-scale=1.0">
    <title>Enrollement d'un membre</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>
        Enrôlement des membres de la commune de Patte d’Oie
            (PHP - POO - MySQL)
        </h1>
        
        <form action="" method="POST">
      
        <label for="matricule">Matricule :</label>
    <input type="text" id="matricule" name="matricule" required><br><br>
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br><br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required><br><br>

    <label for="trancheAge">Tranche d'âge :</label>
    <select id="trancheAge" name="trancheAge">
        <option value="Enfant">Enfant</option>
        <option value="Jeune adulte">Jeune adulte</option>
        <option value="Adulte">Adulte</option>
        <option value="Personne âgée">Personne âgée</option>
    </select><br><br>

    <label for="sexe">Sexe :</label>
    <select id="sexe" name="sexe">
        <option value="M">Masculin</option>
        <option value="F">Féminin</option>
    </select><br><br>

    <label for="situationMatrimoniale">Situation matrimoniale :</label>
    <select id="situationMatrimoniale" name="situationMatrimoniale">
        <option value="Célibataire">Célibataire</option>
        <option value="Marié(e)">Marié(e)</option>
        <option value="Divorcé(e)">Divorcé(e)</option>
        <option value="Veuf/Veuve">Veuf/Veuve</option>
    </select><br><br>

    <label for="statut">Statut :</label>
    <input type="text" id="statut" name="statut"><br><br>

    <div class="confirm">
    <button type="submit">Enregistrer</button>
    <button type="cancel"> <a href="index.php" > Annuler</a></button>
    </div>
   
</form>

    </div>
</body>
</html>
