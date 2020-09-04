const terre = {
	population : 707,
	satellite : "Moon",
	temperature : {
		min : 10,
		max : 45
	},

	AfficheSatellite: function(){
		console.log(this.satellite);
	}
}

// ici, Saturne et terre referenceront
// le même objet, à la même adresse mémoire,
// et auront donc les mêmes propriétés
const saturne = terre;
saturne.population = 0;

console.log(terre);
console.log(saturne);