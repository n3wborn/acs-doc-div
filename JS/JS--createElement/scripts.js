// createElement

// je cible la div qui m'interesse
const app = document.getElementById("app");


// ici je créé un nouveau bouton et lui affecte
// le contenu "Ajouter et une classe
const newBtn = document.createElement('BUTTON');
newBtn.innerText = "Ajouter";
newBtn.classList.add('btn');

// ajoute un eventListener click sur mon bouton
newBtn.addEventListener('click', function() {

	// qui créé un <h2></h2> dans lequel tu écrit :
	// "Ceci est mon nouveau titre"
	const newTitle = document.createElement('H2');
	newTitle.innerText = "Ceci est mon nouveau titre";

	// et ajoute ça dans ma div "app"
	app.appendChild(newTitle);
})

// ici j'ajoute ce bouton dans ma div "app"
app.appendChild(newBtn);