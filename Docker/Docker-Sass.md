# Docker et Sass

On peut utiliser Sass pour traduire du code scss vers du css de manière ponctuelle mais il est également possible que sass reste en écoute des changements fait dans le code scss, c'est à cela que sert l'option **--watch** de Sass.

Comment procéder lorsque l'on utilise Docker ?

## One shot

On peut donc lancer un container dédié à la traduction de scss vers css de cette façon :

```bash
docker run --rm -v "C:\Users\acs.PORT-0308\dev\ACS-Projets\dashboard_project\css":/data codycraven/sassc style.scss > style.css
```

On voit ici qu'on supprimera le container une fois l'operation terminée, grâce à ```--rm ``` et que l'on bind aussi le repertoire contenant notre code scss (ici un chemin windows) en prenant soin d'indiquer également le fichier de sortie. On adaptera  bien evidemment le chemin en fonction de nos cas concrets

Cette methode n'est bien sûre pas optimale en cours de developpement, on veillera donc à utiliser une autre méthode.

## Sass en ecoute

Il est donc plus souple de pouvoir laisser sass ecouter nos changements. Pour ça, il est possible de l'installer dans notre container apache par ex mais le mieux serait de ne rien touche à notre container si on veut garder l'esprit propre à Docker.

L'image larryprice/sass de [larryprice](https://github.com/larryprice/sass-docker), malheureusement non maintenue depuis fort longtemps, écoute tous les changements faits sur le scss et le compile à la volée. Si vraiment créer sa propre image est pas une priorité et qu'on veut "juste" rapidement compiler son scss on peut donc utiliser cette image. Encore une fois, c'est loin d'être une solution digne de ce nom, mais si jamais :

```bash
docker run --rm -ti -v "C:\chemin\vers\scss:/src"  larryprice/sass
```

A noter que le mappage vers le rep /src doit être laissé tel quel car l'*ENTRYPOINT* est placé dans ce repertoire précisément. Pour info, il est sous la forme :

```bash
ENTRYPOINT ["sass", "--watch", "/src"]
```

