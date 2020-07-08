<?php require_once('db.php');

//Tester l'existence de la variable de l'URL 
    if(isset($_GET['id'])){

//Requête sql de suppression avec marqueur nommé qui sera lié avec une variable
        $sql = 'delete from stagiaire where id =:id';
//Prépare la requête
        $sth = $dbh->prepare($sql);
//Lien entre le marqueur nommé & une variable en précisant le type de donnée (pour mysql)
        $sth->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

//Exécuter la requête 
        $sth -> execute();

    }

//Redirection vers l'index avec php
    header('Location: index.php');

?>


