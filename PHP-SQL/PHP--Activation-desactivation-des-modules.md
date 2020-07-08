#  PHP -- Activer desactiver des modules

## Afficher les modules

    php7.4 -m

## Desactiver un module

**On peut desactiver un module pour une version précise uniquement en indiquant la version **

    phpdismod -v 7.4 <module>

## Activer un module

    phpenmod -v 7.4 <module>

## Dossier de configuration des modules

    /etc/php/<version>/