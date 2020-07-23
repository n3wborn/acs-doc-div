<?php
//On créé des variables pour la connexion à la BDD avec PDO
$dsn = 'mysql:host=localhost;dbname=autocomplete';
$user = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

//On se connecte à la BDD
try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (\Throwable $th) {
    throw $th;
}

//Si la superglobale $_POST n'est pas vide
if (!empty($_POST)) {
    //Code de la requête SQL désirée
    $sql = 'SELECT title FROM movie WHERE title LIKE :search ORDER BY title ASC LIMIT 10';

    //On créé grâce à une concaténation une variable pour être la valeur du paramètre nommé
    $search = "%" . $_POST['search'] . "%";

    //On prépare la requête
    $req = $pdo->prepare($sql);

    //On exécute la requête en passant en paramètre un tableau associatif paramètre nommé => valeur
    $req->execute([":search" => $search]);

    //On récupère tous les résultats
    $results = $req->fetchAll();

    //On affiche les résultats encodé en JSON
    echo json_encode($results);
}
