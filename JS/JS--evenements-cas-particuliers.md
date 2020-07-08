# JS -- Evenements -- Evenements et cas particuliers


Imaginons une page html comme celle ci:

    <!DOCTYPE html>
    <html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <title>Evenements JS</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
        <style>
        .hidden {
            display: none;
        }
        </style>
        
    </head>
    
    
    <body>
    
    
        <p>
        <a href="#">Click me</a>
        </p>
    
        <div id="text" class="hidden">
        <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ratione cum optio ut veritatis expedita, distinctio qui reprehenderit fugiat! Quidem!
        </p>
        </div>
    
        <script src="scripts.js"></script>
    </body>
    
    
    </html>

 Pour ajouter un écouteur d'evenement sur notre lien 'Click me' sans déclencher le comportement par défaut de tout lien, aller vers la page ciblée, on va utiliser la fonction ```preventDefault``` comme suit :
    
    // cible mon lien
    const link = document.querySelector('a');
    
    link.addEventListener('click', function(e) {
        // empeche la page de se charger
        e.preventDefault();
        console.log('Hello !');
    
    })

Si lors du click on veut inverser la valeur définie par notre classe hidden, et donc rendre notre élément visible:

    link.addEventListener('click', function(e) {
        // empeche la page de se charger
        e.preventDefault();
    
        //cible ma div ayant l'id "text"
        const text = document.querySelector('#text');
    
        //modifie son état en supprimant sa classe
        text.classList.remove('hidden');
    
    })

Voyons maitenant un formulaire en ajoutant ceci à notre html:
    
    <form action="">
        <div>
            <input type="text" placeholder="nom">
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>

On ajoute donc à notre js :

    //on le cible et crée sa constante
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(e) {
        //on va là-aussi empecher l'envoi
        e.preventDefault();
        console.log('Hello du formulaire !');
    })
