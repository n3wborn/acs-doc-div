<?php
require_once('db.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagiaires</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Stagiaires</h1>
    <p><a href="edit.php">Ajouter</a></p>
    <table>
        <tr>
        <th>ID</th>
        <th>Nom/Prénom</th>
        <th>cp/Ville</th>
        <th>Date d'entrée</th>
        <th>Modifier/Supprimer</th>
        </tr>

    <?php 
// Préparation de la requête
        $sql = 'SELECT id, nom, prenom, cp, ville, date_entree FROM stagiaire';
        $sth = $dbh->prepare($sql);

//Execute
        $sth->execute();


// On va récupérer le résultat/ l'extraction de la requête
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

//Déclaration ou gestion des formats des dates en français
    $intlDateFormater = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);

//On parcours le result & imprime à l'écran les données 
//Pour parcourir toutes les lignes, on doit faire une boucle.

    foreach($result as $row){
        echo '<tr>';
        echo '<td>' .$row['id']. '</td>';
        echo '<td>' .$row['nom'].' '.$row['prenom']. '</td>';
        echo '<td>' .$row['cp'].' '.$row['ville']. '</td>';
        echo '<td>' .$intlDateFormater->format(strtotime($row['date_entree'])). '</td>';
        echo '<td><a href="edit.php?edit=1&id='.$row['id'].'">Modifier </a> 
        <a href="delete.php?id='.$row['id'].'">Supprimer </a></td>';
        echo '</tr>';
    }

    ?>
    </table>
    <?php

//Si le nombre d'élément dans le tableau
// Alors tableau vide ~ Donc pas d'enregistrement
        if(count($result) === 0){
            echo '<p>Aucun stagiaire</p>';
        }
    ?>
</body>
</html>