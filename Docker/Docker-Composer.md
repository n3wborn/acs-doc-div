# Docker et Composer


[composer](https://getcomposer.org/) est utilisé pour installer des dépendances
php. Il est possible d'installer celles-ci depuis un conatiner en utilisant
simplement cette commande :

```bash
docker run --rm -ti - $(pwd):/app composer install
```

Pour avoir l'esprit tranquil si on utilise Docker depuis un hôte Windows, le
mieux est de placer le nom du repertoire en chemin absolu entouré des
guillemets double :

```bash
docker run --rm -ti -v "chemin\absolu\vers\repertoire:/app" composer install
```

Par exemple :

```bash
docker run --rm --interactive --tty --volume "C:\Users\acs.PORT-0308\dev\ACS-Projets\dashboard_project":/app composer install
```

## Persistance des données

on va indiquer où conserver nos données dans un bind mount (toujours adapter
selon l'OS) :

```bash
docker run --rm -ti -v $pwd:/app -v ${COMPOSER_HOME:-$HOME/.composer}:/tmp composer install
```

Comme précise la [doc](https://hub.docker.com/_/composer?tab=description) :

>This relies on the fact that the COMPOSER_HOME value is set to /tmp in the image by default

## Permissions

Il est courant que les containers tournent avec les droits root, ce qui peut
poser problème pour accéder aux données. Ainsi, pour ne pas avoir ce problème
on utiliser un utilisateur sans droits admins pour exécuter composer

```bash
docker run --rm -ti -v $pwd:/app --user $(id -u):$(id -g) composer install
```

## Methode optimale

Toujours selon la doc, le meilleur moyen d'utiliser Composer est de le placer
dans un Dockerfile dans une multi-stage build.
Dans celle-ci on placera :

```dockerfile
COPY --from=composer /usr/bin/composer /usr/bin/composer
```

## Autoload

Lorsque l'on créé nos propres namespace et autoload, par exemple avec un
composer.json comme ceci :

```
{
    "autoload" : {
        "psr-4" : {
            "App\\" : "application/class/"
        }
    },

        "require": {
            "twig/twig": "^3.0",
            "altorouter/altorouter" : "1.1.0"
        }
}
```

On doit, en plus d'installer les dependances, gérer l'autoload. Pour se faire,
on va utiliser dump-autoload:

```
docker run --rm --interactive --tty --volume "C:\Users\acs.PORT-0308\dev\ACS-Projets\dashboard_project":/app composer dump-autoload
```

