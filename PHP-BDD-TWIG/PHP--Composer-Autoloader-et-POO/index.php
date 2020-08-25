<?php

//require dirname(dirname(__FILE__)). DIRECTORY_SEPARATOR . "vendor/autoload.php";

require "vendor/autoload.php";

$fiat = new \Exemple\Voiture();

$fiat->avance();
$fiat->freine();

$fiat->vitesse = 100;
$fiat->deplace(3);

// declenche erreur car protected
// $fiat->$nbRoues = 2;
// si la variable est en private cette variable serait inaccessible

$peugeot = new \Exemple\FormuleOne();
$peugeot->accelere();
$peugeot->vitesse = 300;
$peugeot->deplace(1);
$peugeot->freine();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Classes - namespace et autoload</title>
</head>
<body>

</body>
</html>