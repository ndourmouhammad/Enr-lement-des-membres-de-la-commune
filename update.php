<?php
require_once("config.php");

$matricule = $_GET['matricule'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs soumises par le formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $trancheAge = htmlspecialchars($_POST['trancheAge']);
    $sexe = htmlspecialchars($_POST['sexe']);
    $situationMatrimoniale = htmlspecialchars($_POST['situationMatrimoniale']);
    $statut = htmlspecialchars($_POST['statut']);

    if ($matricule != "" && $nom != "" && $prenom != "" && $prenom != "" && $trancheAge != "" && $sexe != "" && $situationMatrimoniale != "" && $statut != "") {
        $membre->update($matricule, $nom, $prenom, $trancheAge, $sexe, $situationMatrimoniale, $statut);
    }
}



$sql = "SELECT * FROM membre WHERE matricule = :matricule";
$req = $cnx->prepare($sql);
$req->bindValue(':matricule', $matricule);
$req->execute();
$membres = $req->fetch(PDO::FETCH_OBJ);


?>

</html>
<!DOCTYPE html>
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
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?= $membres->nom ?>" required><br><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?= $membres->prenom ?>" required><br><br>

            <label for="trancheAge">Tranche d'âge :</label>
            <select id="trancheAge" name="trancheAge">
                <option value="Enfant" <?= ($membres->trancheAge == "Enfant") ? "selected" : "" ?>>Enfant</option>
                <option value="Jeune adulte" <?= ($membres->trancheAge == "Jeune adulte") ? "selected" : "" ?>>Jeune adulte</option>
                <option value="Adulte" <?= ($membres->trancheAge == "Adulte") ? "selected" : "" ?>>Adulte</option>
                <option value="Personne âgée" <?= ($membres->trancheAge == "Personne âgée") ? "selected" : "" ?>>Personne âgée</option>
            </select><br><br>

            <label for="sexe">Sexe :</label>
            <select id="sexe" name="sexe">
                <option value="M" <?= ($membres->sexe == "M") ? "selected" : "" ?>>Masculin</option>
                <option value="F" <?= ($membres->sexe == "F") ? "selected" : "" ?>>Féminin</option>
            </select><br><br>

            <label for="situationMatrimoniale">Situation matrimoniale :</label>
            <select id="situationMatrimoniale" name="situationMatrimoniale">
                <option value="Célibataire" <?= ($membres->situationMatrimoniale == "Célibataire") ? "selected" : "" ?>>Célibataire</option>
                <option value="Marié(e)" <?= ($membres->situationMatrimoniale == "Marié(e)") ? "selected" : "" ?>>Marié(e)</option>
                <option value="Divorcé(e)" <?= ($membres->situationMatrimoniale == "Divorcé(e)") ? "selected" : "" ?>>Divorcé(e)</option>
                <option value="Veuf/Veuve" <?= ($membres->situationMatrimoniale == "Veuf/Veuve") ? "selected" : "" ?>>Veuf/Veuve</option>
            </select><br><br>

            <label for="statut">Statut :</label>
            <input type="text" id="statut" name="statut" value="<?= $membres->statut ?>"><br><br>

            <div class="confirm">
                <button type="submit">Enregistrer</button>
                <button type="cancel"> <a href="index.php"> Annuler</a></button>
            </div>

        </form>

    </div>
</body>

</html>