# JS -- Evenements -- Recuperer l'element sur lequel le gestionnaire d'evenement a ete rattache


On va partir quasiment sur le même code que lorsque l'on veut recuperer l'element sur lequel l'event a ete declenche

Donc, pour html :

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

Et js :

    document.body.addEventListener('click', function(e) {
        // on affecte nos constantes
        const elClicked = e.target;
        const refEvent = e.currentTarget;
    
        //on guette le resultat
        console.log("Element cible apres propagation de l event", elClicked);
        console.log("Element auquel est rattache l event",  refEvent);
    }) 

