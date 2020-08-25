<?php

namespace Exemple;
use \Exemple\Interfaces\Vehicule as Vehicule;

// On doit implementer nos classes ici !
class Voiture implements Vehicule {

	public $nbRoues = 4;
	// pour tester protected
	// protected $nbRoues = 4;
	public $vitesse = 0;


	public function avance() {
		echo "la voiture avance" . "<br>";
	}

	public function freine() {
		echo "la voiture freine" . "<br>";
	}

	public function passeVitesse(int $i) {
		echo "Je passe la vitesse " . $i . "<br>";
	}

	public function deplace(int $heure) {
		echo "Durant " . $heure . " heures, la voiture s'est deplacee de " . ($this->vitesse * $heure) . "km." . "<br>";
		return($this);
	}

}