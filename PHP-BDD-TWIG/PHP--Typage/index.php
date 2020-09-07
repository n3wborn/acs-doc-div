<?php
// on veut des types stricts
declare(strict_types=1);

// on affiche les erreurs
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

include "vendor/autoload.php";

// on créé une fonction qui prend un argument
// variadique  en placant "..."
function maFonction(int ...$param) : array {
	var_dump($param);
	return $param;
}

maFonction(12, 14, 43);


/**
 * @param integer|null ... $param
 * @return void
 */


/*
// entier en option en parametre
function maFonction(?int ...$param) : void {
	var_dump($param);
	return $param;
}

maFonction(12, bull, 32);
*/