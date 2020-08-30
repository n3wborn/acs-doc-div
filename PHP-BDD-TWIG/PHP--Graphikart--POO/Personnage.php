<?php

class Personnage
{
	//variable publiques
	public $vie = 80;
	public $atk = 20;

	//variable declarée mais vide
	public $nom;

	//variable privée
	private $surnom;


	// cette fonction sert à donner une valeur à la variable $nom
	// des la creation de l'objet : $instance = new Personnage("Nouveau Perso)
	public function __construct($nom)
	{
    $this->nom = $nom;
	}

	// permet de recupérer la var private $surnom (getter)
	public function getSurnom()
	{
		return $this->surnom;
	}

	// permet de donner une valeur à la variable private (setter)

	public function setSurnom($surnom)
	{
		$this->surnom = $surnom;
	}


	public function crier()
	{
		echo "LEEROY JENKINS...";
	}


	// redonne 100 points de vie par defaut
	// ou $points si precise
	public function regenerer($points = null)
	{
		if (isset($points)){
			$this->vie += $points;
		} else {
			$this->vie = 100;
		}
	}

	// verifie si le perso est mort
	public function mort()
	{
		if ( $this->vie <= 0 ) {
			echo $this->nom . " est mort <br>";
		} else {
			echo $this->nom . " est vivant ! <br>";
		}
	}

	// fonction d'attaque
	public function attaque($cible)
	{
		// $this : attaquant
		// $cible : defenseur

		$cible->vie -= $this->atk;
		//$cible->vie = 20;
	}
}

