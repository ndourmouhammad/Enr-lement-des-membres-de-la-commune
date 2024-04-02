<?php
require_once("config.php");
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
        <h1>
        Enrôlement des membres de la commune de Patte d’Oie
            PHP - POO - MySQL
        </h1>
        <a href="create.php" class="Btn_add"> <img src="images/plus.svg"> Ajouter</a>
        
        <table>
            <tr matricule="items">
                <th>Matricule</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Tranche d'age</th>
                <th>Sexe</th>
                <th>Situation matrimoniale</th>
                <th>Statut</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                // Si non, affichons la liste de tous les employés
                        foreach($results as $result) {
            ?>
                            <tr>
                                <td><?= $result['matricule'] ?></td>
                                <td><?= $result['prenom'] ?></td>
                                <td><?= $result['nom'] ?></td>
                                <td><?= $result['trancheAge'] ?></td>
                                <td><?= $result['sexe'] ?></td>
                                <td><?= $result['situationMatrimoniale'] ?></td>
                                <td><?= $result['statut'] ?></td>
                               
                                <!-- Nous allons mettre la matricule de chaque membre dans ce lien -->
                                <td><a href="modifier.php?matricule=<?= $result['matricule'] ?>"><img src="images/pen.svg"></a></td>

                                <td><a href="supprimer.php?matricule=<?= $result['matricule'] ?>"><img src="images/trash.svg"></a></td>
                                
                            </tr>
            <?php
                        }
               
            ?>
        </table>
    </div>
</body>
</html>
