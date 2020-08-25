<?php

namespace Exemple;

class FormuleOne extends Voiture{

	public function accelere(){
		$this->passeVitesse(3);
		echo "La Formule 1 accelere" . "<br>";
	}

}