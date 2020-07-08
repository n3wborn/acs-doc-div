# JS -- Evenements -- Ajouter un évenement à une collection d'éléments HTML

On part du code html suivant:

    <ul>
        <li>Mot_1</li>
        <li>Mot_2</li>
        <li>Mot_3</li>
        <li>Mot_4</li>
    </ul>

Et en js :
    
    // selection des li
    const elements = document.getElementsByTagName('li');
    
    // je les affiche
    console.log(elements);
    
Si je veux ecouter chaque evenement, je dois boucler sur chaque 
element de ma collection d'elements

    for (let element of elements) {
        element.addEventListener('click', function() {
            console.log('Hello');
        })
    }

si je veux cibler un element precis:

    elements[0].addEventListener('click', function(){
            console.log('Element 1');
    })
    
    // et ainsi de suite sur chaque element...

**Attention !** Vu que j'ai affecté deux fois un eventListener sur des elements de ma collection html, les deux fonctions vont s'exécuter ! 
Pour éviter ce genre de problème on va faire autrement. 

On supprime les blocs ciblant les elements uniques et on va plutot réécrire notre boucle en précisant cette fois un mot clé bien utile: ```this```


    for (let element of elements) {
        element.addEventListener('click', function() {
            console.log(this);
        })
    }

Et donc, pour faire une action précise en fonction de tel ou tel élément, on va utiliser ce genre de condition:

    for (let element of elements) {
        element.addEventListener('click', function() {
            if (this.innerText == 'Mot_1') {
                console.log('1');
            }
        })
    }
