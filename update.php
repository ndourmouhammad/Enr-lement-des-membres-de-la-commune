<?php
require_once("config.php");
$matricule = $_GET['matricule'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs soumises par le formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $id_trancheAge = htmlspecialchars($_POST['trancheAge']);
    $sexe = htmlspecialchars($_POST['sexe']);
    $situationMatrimoniale = htmlspecialchars($_POST['situationMatrimoniale']);
    $id_statut = htmlspecialchars($_POST['statut']);
    $id_quartier = htmlspecialchars($_POST['quartier']);

    if ($membre->validateNom($nom) && $membre->validatePrenom($prenom)) {
        $membre->update($matricule, $nom, $prenom, $id_trancheAge, $sexe, $situationMatrimoniale, $id_statut, $id_quartier);
    } else {
        echo "Veuillez revoir les champs nom ou prenom.";
    }
}

$sql = "SELECT * FROM membre WHERE matricule = :matricule";
$req = $cnx->prepare($sql);
$req->bindValue(':matricule', $matricule);
$req->execute();
$membres = $req->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrôlement d'un membre</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>
            Enrôlement des membres de la commune de Patte d’Oie (PHP - POO - MySQL)
        </h1>

        <form action="" method="POST">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $membres->nom ?>" required><br><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $membres->prenom ?>" required><br><br>

            <label for="trancheAge">Tranche d'âge :</label>
            <select name="trancheAge" id="trancheAge" required>
                <option value="">Choisis ta tranche d'âge</option>
                <?php foreach ($ages as $age) : ?>
                    <option value="<?php echo $age->id; ?>" <?php if($age->id == $membres->id_trancheAge) echo 'selected="selected"'; ?>><?php echo $age->tranche; ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="sexe">Sexe :</label>
            <select id="sexe" name="sexe">
                <option value="M" <?php if($membres->sexe == 'M') echo 'selected="selected"'; ?>>Masculin</option>
                <option value="F" <?php if($membres->sexe == 'F') echo 'selected="selected"'; ?>>Féminin</option>
            </select><br><br>

            <label for="situationMatrimoniale">Situation matrimoniale :</label>
            <select id="situationMatrimoniale" name="situationMatrimoniale">
                <option value="Célibataire" <?php if($membres->situationMatrimoniale == 'Célibataire') echo 'selected="selected"'; ?>>Célibataire</option>
                <option value="Marié(e)" <?php if($membres->situationMatrimoniale == 'Marié(e)') echo 'selected="selected"'; ?>>Marié(e)</option>
                <option value="Divorcé(e)" <?php if($membres->situationMatrimoniale == 'Divorcé(e)') echo 'selected="selected"'; ?>>Divorcé(e)</option>
                <option value="Veuf/Veuve" <?php if($membres->situationMatrimoniale == 'Veuf/Veuve') echo 'selected="selected"'; ?>>Veuf/Veuve</option>
            </select><br><br>

            <label for="statut">Statut</label>
            <select name="statut" id="statut" required>
                <option value="">Choisis un statut</option>
                <?php foreach ($statuts as $statut) : ?>
                    <option value="<?php echo $statut->id; ?>" <?php if($statut->id == $membres->id_statut) echo 'selected="selected"'; ?>><?php echo $statut->libelle; ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="quartier">Quartier</label>
            <select name="quartier" id="quartier" required>
                <option value="">Choisis un quartier</option>
                <?php foreach ($quartiers as $quartier) : ?>
                    <option value="<?php echo $quartier->id; ?>" <?php if($quartier->id == $membres->id_quartier) echo 'selected="selected"'; ?>><?php echo $quartier->libelle_q; ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <div class="confirm">
                <button type="submit">Modifier</button>
                <button type="cancel"><a href="index.php"> Annuler</a></button>
            </div>
        </form>
    </div>
</body>

</html>
