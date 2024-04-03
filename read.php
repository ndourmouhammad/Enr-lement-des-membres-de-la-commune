<?php
require_once("config.php");


$matricule = $_GET['matricule'];

$results = $membre->afficherDetails($matricule);
?>
</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wmatriculeth=device-wmatriculeth, initial-scale=1.0">
    <title>Gestion des membres de la commune de Patte d'd’Oie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Commune de Patte d’Oie</h1>
        <h2>
        <?php echo $results['prenom']; echo' '; echo $results['nom'];?>
        </h2>
        <a href="index.php" class="Btn_add"> <img src="images/home.svg"> Accueil</a>
        
        <table>
            <tr matricule="items">
                <th>Matricule</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Tranche d'age</th>
                <th>Sexe</th>
                <th>Situation matrimoniale</th>
                <th>Statut</th>
                <th>Quartier</th>
            </tr>
            <?php 
                        
            ?>
                            <tr>
                                <td><?= $results['matricule'] ?></td>
                                <td><?= $results['prenom'] ?></td>
                                <td><?= $results['nom'] ?></td>
                                <td><?= $results['tranche'] ?></td>
                                <td><?= $results['sexe'] ?></td>
                                <td><?= $results['situationMatrimoniale'] ?></td>
                                <td><?= $results['libelle'] ?></td> 
                                <td><?= $results['libelle_q'] ?></td>            
                            </tr>
            <?php
                        
               
            ?>
        </table>
    </div>
</body>
</html>
