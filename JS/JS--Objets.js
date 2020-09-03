// on créé un nouvel Object
// (maVoiture est une constante, donc non modifiable
const maVoiture = new Object();

// Création d'un objet auquel on assigne des propriétés
maVoiture.fabricant = "Ford";
maVoiture.modele = "Mustang";
maVoiture.annee = 1969;
maVoiture.getAnnee = function(){
    return this.annee;
}

// debug
// console.log(maVoiture);

// creation de la fonction Voiture
function Voiture (fabricant, modele, annee){
    this.fabricant = fabricant;
    this.modele = modele;
    this.annee = annee;
}


// methode getAnnee affichant la valeur de la variable annee
// de l'instance appellante
Voiture.prototype.getAnnee = function(){
    return this.annee;
}


// creation d'une nouvelle instance et assignation des valeurs
let maVoiture2 = new Voiture("Eagle", "Talon TSi", 1993);

// debug
//console.log(maVoiture2);


// Affectation littérale (differente methode de creation d'un objet)
var Animal = {
    type: "Invertebré",
    afficherType : function(){
        console.log(this.type);
    }
}


// nouvelle instance de l'objet Animal
let Animal1 = Object.create(Animal);


// debug des deux instances
console.log(Animal);
console.log(Animal1);

// affichage de la valeur de Animal1.type grace à la methode afficherType
Animal1.afficherType();


// Poisson, nouvelle instance de l'objet Animal.
// Cette fois, en  utilisant la methode create de l'objet js Object
let Poisson = Object.create(Animal);


// cangement du type en utilisant la syntaxe  Objet.propriete = "valeur"
Poisson.type = "poisson";

// avec la methode afficherType() on affiche la valeur de la propriete type
Poisson.afficherType();
