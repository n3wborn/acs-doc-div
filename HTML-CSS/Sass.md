#Sass

*Sass est un préprocesseur qui compile le css*

.scss et .sass

extension .sass : syntaxe indentée (indentation en place des accolades)
extension .css : avec accolades


## Installation de NodeJS/NPM

```bash
    curl -sL https://deb.nodesource.com/setup_12.x -o nodesource_setup.sh
    sudo bash nodesource_setup.sh
    sudo apt install nodejs
```

## Installation de Sass

```bash
npm install sass
```

NOTE: **Il est possible que l'option -g soit necessaire** 

## Création css

Une fois installé, on lance la commande suivante pour que sass transforme notre fichier en .css

```bash
sass --watch in out
```

in = fichier .sccs source
out = fichier css resultant