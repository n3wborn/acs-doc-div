<?php
require_once "header.php";
?>

<form>
    <!-- Nous allons générer les inputs de notre formulaire en JS -->
    <div id="inputs">

    </div>
    <button>Envoyer</button>
</form>
<div id="score">


</div>
<div id="answers">

</div>
<script>
    //Je sélectionne les différents éléments HTML dont j'aurais besoin
    const form = document.querySelector("form");
    const inputs = document.getElementById("inputs");
    const divScore = document.getElementById("score");
    const divAnswers = document.getElementById("answers");

    //Fonction JS pour générer un nombre entier aléatoire 
    function randomNumber(maximum, minimum) {
        return Math.floor(Math.random() * (maximum - minimum + 1)) + minimum;
    }

    //Cette fonction pour générer les inputs peut être grandement amélioré
    function generateForm() {
        //Je vide tout d'abord le contenu HTML dans ma div d'id inputs
        inputs.innerHTML = "";
        //Je boucle pour créer les 5 questions
        for (let i = 0; i < 5; i++) {
            //Je créé 2 nombres aléatoires entre 1 et 10
            let rand1 = randomNumber(10, 1);
            let rand2 = randomNumber(10, 1);

            //Je créé mes 2 inputs hidden grâce à document.createElement et .setAttribute
            let inputHidden1 = document.createElement("input");
            inputHidden1.setAttribute("type", "hidden");
            inputHidden1.setAttribute("name", "form" + i + "rand1");
            inputHidden1.setAttribute("value", rand1);

            let inputHidden2 = document.createElement("input");
            inputHidden2.setAttribute("type", "hidden");
            inputHidden2.setAttribute("name", "form" + i + "rand2");
            inputHidden2.setAttribute("value", rand2);

            //Je créé mon label
            let label = document.createElement("label");
            label.innerText = "Combien font " + rand1 + " * " + rand2 + " ?";

            //Je créé l'input de réponse
            let inputText = document.createElement("input")
            inputText.setAttribute("type", "text");
            inputText.setAttribute("name", "result" + i);

            //Je créé un saut de ligne (ça peut clairement être mieux fait tout ça pour la présentation)
            let br = document.createElement("br")

            //J'ajoute tous mes éléments HTML créés à l'intérieur de la div prévu pour les accueillir
            inputs.appendChild(inputHidden1);
            inputs.appendChild(inputHidden2);
            inputs.appendChild(label);
            inputs.appendChild(inputText);
            inputs.appendChild(br);
        }
    }

    //J'appelle une première fois cette fonction lors du chargement de la page
    generateForm();

    //J'écoute l'évènement "submit" (soumission) sur mon formulaire
    form.addEventListener("submit",
        //Lorsque cette évènement se déclenche, cette fonction est appelé et a en paramètre l'Event
        //voir syntaxe ES6 arrow function pour mieux comprendre
        e => {
            //J'empêche le comportement par défaut (la soumission du formulaire)
            e.preventDefault();
            //Je créé une variable qui contient le contenu de mon formulaire 
            // ATTENTION a bien créé cette variable après qu'on ait tenté de soumettre le formulaire !
            const formData = new FormData(form);

            //ici j'utilise fetch pour faire de l'AJAX, ça n'est pas la seule manière. Il existe également XMLHttpRequest, $.ajax avec JQuery ou même axios qui vous demanderait d'être installé avec npm
            fetch('treatment.php', {
                    body: formData,
                    method: "post"
                })
                //On parse la response JSON du serveur sous forme d'objet JavaScript
                .then(response => response.json())
                //Ce que l'on fait ensuite avec cet objet JavaScript
                .then(data => {
                    //je vide tout d'abord les divs
                    divAnswers.innerHTML = "";
                    divScore.innerHTML = "";
                    //J'affiche le score
                    divScore.innerHTML = `<p>Votre score est de ${data.score}/5</p>`;
                    //J'affiche les réponses
                    data.rightAnswers.forEach(answer => {
                        divAnswers.innerHTML += answer;
                    });
                    //je regénère les inputs du formulaire
                    generateForm();
                });
        });
</script>
</body>

</html>