# Docker et npm

Utiliser Docker, c'est souvent pour utiliser des éléments réutilisables, tels quels.
Lorsqu'on utilise un container brievement et qu'on peut le lancer et l'oublier aussi tôt, pourquoi s'en
priver.

Je prefere garder les elements qui tournent en tache de fond dans un docker-compose.yml et les lancer ensemble.
apache/php/mariadb/phpmyadmin sont le parfait exemple.

Pour ce qui est d'utiliser npm, je prefere encore lancer un container qui fera le job et finira sa vie une fois qu'il aura bien travaillé.
Par exemple, pour un projet, j'ai plusieurs dependances sagement listées dans un package.json.
Je dois installer tout ça ? Pour se faire, rien de bien transcendant :

```bash
 docker run -it --rm --name node -v "<dossier ou est mon package.json>:/usr/src/app" -w /usr/src/app node:8 npm install
```

Ah bon ?! Il faut build votre webpack ?! Bon...

```bash
docker run -it --rm --name node -v "<dossier racine du projet >:/usr/src/app" -w /usr/src/app node:8 npm run build
```

Et hop, on en parle plus. Pour un peu de doc, je vous laisse faire comme moi, cherchez ! En plus c'est [ici](https://dev.to/ms314006/how-to-package-front-end-projects-into-docker-images-and-use-it-with-webpack-go3) quelle chance !

Une fois les images dont Docker a besoin sont telechargées, c'est pas plus lent (ou aussi rapide) que la commande npm elle-même. Pas besoin de mettre Node sur mon PC (ni apache, ni php, ni phpmyadmin, ni symfony, ni composer, ni que sais-je sortira encore d'ici 1 an ...) juste Docker !
Parce que le mieux, une fois que je retourne - heureux - sur ma fedora, je prends mon repo, je fais la même chose et j'obtiens le même resultat.

C'est pas mieux comme ça ?! :)


