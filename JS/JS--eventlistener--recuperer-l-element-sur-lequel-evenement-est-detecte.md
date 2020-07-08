# JS -- Evenements -- Recuperer l'element sur lequel l'evenement est detecte

On part de ce html :

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>JS</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, 
        initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style>
        .hidden {
            display: none;
        }
    </style>
    </head>
    
    <body>
        
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat atque temporibus, veniam sapiente, nulla illo explicabo esse suscipit vero magni.</p>
        <h2>Titre</h2>
        <ul>
            <li>Ceci est un text</li>
            <li>Ceci est un text</li>
            <li>Ceci est un text</li>
        </ul>
    
        <script src="scripts.js"></script>
    </body>
    </html>


Et au lieu d'ecouter sur chaque element, on va ecouter sur **l' element parent** , ici body. 
Pour voir exactement ce qui nous est retourné dans ces cas là, on va utiliser console.log() conjointement à l'argument e de notre fonction anonyme :

    document.body.addEventListener('click', function(e) {
        console.log(e);
    })

Et on se retrouve avec ce genre de résultat :

    click { target: h2, buttons: 0, clientX: 36, clientY: 62, layerX: 36, layerY: 62 }

Maintenant affectons une constante à l'élément sur lequel l'evenement s'est declenché :

    document.body.addEventListener('click', function(e) {
        // on affecte une constante
        const elClicked = e.target;
    
        // on guette le resultat
        console.log(elClicked);
    
    })

Désormais, si on veut agir sur l' element qui a decleché l'evenement, par exemple attribuer une classe precise, on peut le faire simplement :

    document.body.addEventListener('click', function(e) {
        // on affecte une constante
        const elClicked = e.target;
    
        // on guette le resultat
        console.log(elClicked);
    
        // on ajoute la classe voulue
        elClicked.classList.add('hidden');
    })  
