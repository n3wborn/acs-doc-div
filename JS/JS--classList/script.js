
const burger = document.querySelector('header > p > a');
const close = document.querySelector('nav > p > a');
const liste = document.getElementsByClassName('btn');

console.log(liste);

function toggleNavBar(){
const navBar = document.querySelector('nav');
//On applique la méthode toggle de classList à l'élément
//Si la classe show n'est pas présente il ajoute à l'attribut classe, si elle est présente, il l'enlève
navBar.classList.toggle('show');
}

//Ajout du gestionnaire d'évènement
burger.addEventListener('click', function(e){
e.preventDefault();
toggleNavBar();
});

//Ajout de l'évènement à l'élément HTML close
close.addEventListener('click', function(e){
e.preventDefault();
toggleNavBar();

});


for (element of liste) {
	//verifie si l'attribut class contient la classe delete
	if (element.classList.contains('delete')) {
		element.remove();
	}
}