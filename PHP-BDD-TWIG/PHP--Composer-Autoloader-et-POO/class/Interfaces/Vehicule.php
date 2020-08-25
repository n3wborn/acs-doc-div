<?php

namespace Exemple\Interfaces;
use \Exemple\Interfaces\Vehicule as Vehicule;

interface Vehicule {

	/**
		* Methode pour avancer
		*/
	public function avance();

	/**
		* Methode pour freiner
		*/
	public function freine();
}
