# Docker et Composer


[composer](https://getcomposer.org/) est utilisé pour installer des dépendances php. Il est possible d'installer celles-ci depuis un conatiner en utilisant simplement cette commande :

```bash
docker run --rm -ti - $PWD:/app composer install
```

Pour avoir l'esprit tranquille si on utilise Docker depuis un hôte Windows, le mieux est de placer le nom du repertoire en chemin absolu entouré des guillemets double :

```bash
docker run --rm -ti -v "chemin/absolu/vers/repertoire:/app" composer install
```

## Persistance des données

on va indiquer où conserver nos données dans un bind mount (toujours adapter selon l'OS) :

```bash
docker run --rm -ti -v $PWD:/app -v ${COMPOSER_HOME:-$HOME/.composer}:/tmp composer install
```

Comme précise la [doc](https://hub.docker.com/_/composer?tab=description) :

>This relies on the fact that the COMPOSER_HOME value is set to /tmp in the image by default

## Permissions 

Il est courant que les containers tournent avec les droits root, ce qui peut poser problème pour accéder aux données. Ainsi, pour ne pas avoir ce problème on utiliser un utilisateur sans droits admins pour exécuter composer

```bash
docker run --rm -ti -v $PWD:/app --user $(id -u):$(id -g) composer install
```

## Methode optimale

Toujours selon la doc, le meilleur moyen d'utiliser Composer est de le placer dans un Dockerfile dans une multi-stage build. 
Dans celle-ci on placera :

```dockerfile
COPY --from=composer /usr/bin/composer /usr/bin/composer
```

