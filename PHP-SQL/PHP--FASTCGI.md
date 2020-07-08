# PHP - FASTCGI

On va avoir besoin d'un apache, de mariadb et biens sur PHP

## Install

	apt install apache2
    sudo apt-get install software-properties-common
    
    sudo apt-key adv --fetch-keys 'https://mariadb.org/mariadb_release_signing_key.asc'
    
    sudo add-apt-repository 'deb [arch=amd64,arm64,ppc64el] http://kozyatagi.mirror.guzel.net.tr/mariadb/repo/10.5/ubuntu focal main'
    
    sudo apt update
    sudo apt install mariadb-server
    
    sudo mysql_secure_installation
    
    sudo apt install php


## On remplace API Server par FPM

    sudo apt install php-fpm

## On verifie l'install

    sudo service php7.4-fpm status

## On lance module apache 

    sudo a2enmod proxy_fcgi

## On va dans notre repertoire apache2

    cd /etc/apache2/sites-available

## On modifie la conf par défaut

Entre les directives <.VirtualHost *:80> on ajoute :

    <FilesMatch ".php$">
        SetHandler "proxy:unix:/var/run/php/php7.4-fpm.sock|fcgi://localhost"
    </FilesMatch>

## On redémarre apache2

    sudo service apache2 restart


