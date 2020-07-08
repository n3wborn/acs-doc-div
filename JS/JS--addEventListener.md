# JS -- Evenements -- Ecouteur d'evenement javascript

[source devdocs.io](https://devdocs.io/dom/eventtarget/addeventlistener)

Pour ajouter un écouteur d'evenement à un élément html on va utiliser la méthode suivante :

    target.addEventListener(type, listener[, options]);

Exemple, avec le code html suivant :

    <button id="btn">Hello</button>

En js on aura :

    //je cible mon bouton
    const mybtn = document.getElementById('btn');

    //et je lui ajouter un ecouteur d'evenement, ici click
    mybtn.addeventlistener('click', function()) {
        console.log('Hello');
    }
    
    //le double click
    mybtn.addeventlistener('dblclick', function()) {
        console.log('Hello');
    }
    
    //et le mouseover
    mybtn.addeventlistener('dblclick', function()) {
        console.log('Hello');
    }

Si on veut délencher une fonction que l'on a créé, ne va pas la placer directement mais on va plutot procéder ainsi:

    //ma fonction
    function sayHello () {
        console.log('Hello');
    }

    //et son declenchement lors des evenements
    mybtn.addeventlistener('dblclick', function()) {
        sayHello();
    }

Et on fera de même pour chaque evenement que l'on veut ecouter
