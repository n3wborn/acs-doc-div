<?php

require "Personnage.php";

// nouvelle instance de Personnage, appellée $merlin
// grace à __construct, on donne une valeur à $nom lors de l'instanciation
$merlin = new Personnage("Merlin");

// on affecte une valeur a la variable $nom de l'instance merlin
// plus besoin apres avoir créé __construct
//$merlin->nom = "Merlin";

// on affecte 100 à la variable $vie de merlin
//$merlin->regenerer();


// nouvelle instace de Personnage, appellée $harry
$harry = new Personnage("Harry");


// on donne une valeur à la variable private grâce à la methode setSurnom()
$harry->setSurnom("Harry le magicien");

// on récupère la variable private grace à la fonction public getNom()
// (cf: getter)
$surnom_harry = $harry->getSurnom();

echo "getSurnom -> ";
var_dump($surnom_harry);
echo "<br>";


// on affecte une valeur a la variable $nom de l'instance de harry
// plus besoin apres avoir créé __construct
// $harry->nom = "Harry";

// On met à 0 pour voir si mort() fonctionne bien
// $harry->vie = 0;
// $harry->mort();

// GOD Mode
//$harry->regenerer();
$harry->regenerer(200);


// Resultats du combat

$harry->mort();
var_dump($harry);

echo "<br>";
echo "<br>";
$merlin->mort();
var_dump($merlin);
