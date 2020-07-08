# Twig

## Intro

Twig va s'utiliser avec php et va nous servir à faire du templating

[site](https://twig.symfony.com/)
[doc](https://twig.symfony.com/doc/3.x/)

## Composer -- Installation

Pour utiliser twig il faut deja commencer par installer composer (ce qui necessite curl). Ce qui se fait comme ceci :

```bash
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
```

Si besoin, on installe zip/unzip

```bash
sudo apt install unzip php7.4-zip
```

## Twig -- Installation par Composer

On se déplace dans le répertoire de notre projet

```bash
cd /var/www/html
```

Ensuite, on indique à Composer que notre projet necessite Twig

```bash
composer require "twig/twig:^3.0"
```

Une fois fait, on se retrouve avec tout ce qui sera necessaire pour composer et twig :

- le dossier vendor
- un fichier composer.json

Si jamais, lors de l'install de la dernère commande, il est indiqué qu'un paquet est nécessaire, on le télécharge, ça pourra aider !
À noter que'il est deja disponible si on utilise l'image docker webdevops/apache-php. Sinon :

```bash
sudo apt install -y php7.4-mbstring
```

## Git -- Ignorer l inutile 

Concernant git, on n'a aucune raison de garder les dossiers/fichiers inutiles tels que le dossier vendor et le fichier composer.lock vu que ceux ci sont justement reconstruits lors d'un ```composer install``` . 

On va donc ajouter ceci à notre .gitingore :

```bash
vendor
composer.lock
```

et commiter celui-ci !

```bash
git add .gitignore
git commit -m "Add .gitignore" .gitignore
```

## Twig -- Préparation du projet

Pour pouvoir utiliser Twig, il faut lui indiquer (dans notre fichier index.php) les bonnes indications. D'après la [doc](https://twig.symfony.com/doc/3.x/api.html) le code est le suivant

```php
require_once '/path/to/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('/path/to/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => '/path/to/compilation_cache',
]);
```

La première ligne sert à indiquer où se trouve (par rapport à notre fichier index.php) le dossier vendor.

Les suivants serviront pour savoir où se trouvent nos templates et commment gérer le cache (que l'on n'utilise pas pour le moment).

Pour mon projet, cela donnera donc :

```php
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);
```

## Twig -- Créer et charger nos templates


Pour que Twig puisse charger un template il va avoir besoin qu'on lui demande :

```php
$template = $twig->load('index.html');
```

### Note sur Docker

Lorsque nous utilisons un container Docker pour faire tourner notre serveur web (webdevops/apache-php par exemple) le plus simple pour installer/utiliser Composer est de le lancer dans un container à part et le laisser faire ce travail lui-même. La [doc](https://hub.docker.com/_/composer) de l'image docker de Composer traite du sujet.

Depuis le répertoire racine de notre projet on va lancer exécuter notre container Composer, en remarquant au passage que l'on prend en considération les éventuels problèmes relatifs aux droits des fichiers :

```bash
docker run --rm -ti -v $PWD:/app --user $(id -u):$(id -g) composer install
```

Et voilà, on a su tirer profit de Composer et s'en débarasser dans la foulée  une fois sa tache effectuée.

## Twig -- Passer des variables à notre template

Un des avantages de Twig est que l'on peut lui affecter des variables. Celles  ci seront remplacés ensuite lors du chargement de notre template.

Dans notre fichier **index.php** on place ceci dans notre body:

```php
// Je déclare mes variables
$nom  = "Neo";
$prenom = 'The One';

// Et indique à Twig de les utiliser au travers 
// d'un tableau associatif
echo $template->render(['nom' => $nom, 'surname' => $prenom])
// On remarque que la "clé" utilisée par Twig pour affecter des valeurs
// dans le template peut très bien avoir un nom différent de la variable
```

Et dans notre **template twig** (nommé base.html.twig dans la présentation) :

```html
<h1>Découverte de Twig</h1>
<p>Mon nom est {{ nom }} {{ surname }}</p>
```

## Composer - Twig -- Utilisation avec un repo

L'interet de cette façon de faire se traduit par un mode de templating assez puissant tout en gardant un repo relativement léger vu que nous ne gardons pas le contenu du dossier vendor dans notre repo.

Ainsi, si on veut cloner notre projet il est ensuite tout à fait possible de recréer tout les dossiers/fichiers nécessaires en relançant un simple :

```bash
composer install
```

