# Docker et Mariadb

## Start a mariadb server instance

		docker run --name mariadb-container -e MYSQL_ROOT_PASSWORD=passwd -d mariadb

## Connect to MariaDB from the MySQL command line client

		docker run -it --network some-network --rm mariadb mysql -h mariadb-container -u example-user -p

## Shell into a container

		docker exec -it mariadb-container bash

## Show logs of a	container

		docker logs mariadb-container

## Creating database dumps

		docker exec mariadb-container sh -c 'exec mysqldump --all-databases -u root -p "$MYSQL_ROOT_PASSWORD" ' > dump.sql

## Restoring data from dump files

		docker exec -i mariadb-container sh -c 'exec mysql -u root -p "$MYSQL_ROOT_PASSWORD"' < dump.sql


## Lier phpmyadmin à mariadb

**Ne pas oublier le nom de la machine (HOST)**

    docker run -it --rm --name PMA --link mariadb:db -e MYSQL_ROOT_PASSWORD=mariadb -e PMA_HOST=mariadbHOST -p 8081:80 phpmyadmin/phpmyadmin

## Lier un container webdevops 

*Exemple avec un chemin Windows*

    docker run --ti --rm -p 8080:80 --link mariadb -v "C:\Users\stef\dev\projet-web":/app webdevops/php-apache

