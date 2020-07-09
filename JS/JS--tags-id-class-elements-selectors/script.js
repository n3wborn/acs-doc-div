//affecte l'element ayant orange comme ID à une variable
const orange = document.getElementById('orange');
console.log('orange');
orange.innerText = 'Je suis la plus belle orange !!!'


//on selectionne les elements de la classe "liste"
//(on recupere un tableau)
const liste = document.getElementsByClassName('liste');
console.log('liste');
liste[0].innerText = 'Bien dormir'
liste[1].innerText = 'Bien manger'
liste[2].innerText = 'Bien coder'

const spans = document.getElementsByTagName('span');
console.log('spans')
spans[2].innerText = 'FIN'


const myform = document.getElementsByName('myform');
console.log(myform)
myform[0].setAttribute('action', 'test.php')


// Avant que querySelector existe il fallait cibler un element
// precis comme ceci
const divPratique = document.getElementById('pratique');
const secondPara = divPratique.getElementsByTagName('p')[1];

// Mais aujourd'hui on a querySelector
const sampleSecondPara = document.querySelector('#pratique > p:nth-child(2)')
console.log(sampleSecondPara);

//pour tous les elements :
const newListe = document.querySelectorAll('.liste');
console.log(newListe);
newListe[0].innerText = "Premier point modifié par js";

//pour le premier et le dernier :
const firstAndLast = document.querySelectorAll('.liste:first-child, .liste:last-child ');
console.log(newListe);
