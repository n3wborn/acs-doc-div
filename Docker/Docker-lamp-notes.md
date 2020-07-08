# Notes Docker lamp Mariadb

## Dockerfile de ma Mariadb

		FROM mariadb:latest
    
		ENV MYSQL_ROOT_PASSWORD root
		ENV PACKAGES openssh-server openssh-client vim
    
		RUN apt-get update && apt-get install -y $PACKAGES
		RUN sed -i 's|^#PermitRootLogin.*|PermitRootLogin yes|g' /etc/ssh/sshd_config
		RUN echo 'root:root' | chpasswd

## Build de Mariadb

		docker build -t n3wborn/mariadb .

## Lancement de Mariadb

	docker run --rm -ti --name mariadb -p 3306:3306 -e MYSQL_ROOT_PASSWORD=root n3wborn/mariadb

## Importation de ma base dans mariadb


	docker exec -i mariadb sh -c "mysql -uroot -proot" < dump.sql

## Obtenir un shell sur le container Mariadb

	docker exec -ti mariadb bash

## Se connecter à la base Mysql

	mysql -u root -p
    
	mysql> SHOW DATABASES;
    
	mysql> ...

## Afficher le nom de la machine

(Utile pour se connecter dessus ensuite avec Php)

	docker ps

## Lancer notre container Apache et  Php et les connecter à Mariadb

L'image webdevops utilise le dossier /app et non pas le dossier d' Apache par défaut
( /var/www/html )

	docker run --rm -ti --name lamp -p 8080:80 --link mariadb -v dossierdenotresite:/app webdevops/php-apache

## Adapter nos infos de connection

		<?php
			$dsn = 'mysql:dbname=bdd.sql;host=ae9cadd46a72';
			$user = 'root';
			$password = 'root';

			try {
			  $connexion = new PDO($dsn, $user, $password);
			  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
			  echo 'Connexion échouée : ' . $e->getMessage();
			}
		?>

## Afficher les logs du Mariadb

        docker logs mariadb

## Faire un dump de notre base de données

        docker exec mariadb sh -c 'exec mysqldump --all-databases -u root -p "$MYSQL_ROOT_PASSWORD" ' > dump.sql

## Sauvegarder les modifications dans une nouvelle image

        docker commit <id_du_conteneur> <nom_de_la_nouvelle_image>

## Et sauvegarder cette image (pour la mettre sur le hub ou autre)

        docker save <nom_de_la_nouvelle_image> > monimagedocker.tar

## Notes

On peut se créer un réseau uniquement pour ces deux machines en spécifiant l'option `--network nomdureseau` à chaque lancement ou dans un Docker-compose.yml .

Il est aussi possible d'avoir des données persistantes lorsque des modifications sont faites dans la bdd. On utilisera pour ça un "volume" dédié. On peut préciser ce volume en lors du lancement avec `-v volume-mariadb:/var/lib/mysql` ou, bien évidemment, dans le fichier Docker-compose.yml.

Exemple où je créé un réseau propre à mes "services" et utilise un volume pour garder les modifications faites sur ma base données.

```
version: "3.7"

networks:

  dev-net:
    driver: bridge

services:

  php-apache:

    image: webdevops/php-apache

    networks:
      - dev-net

    ports:
      - 8080:80

    environment:
      - PMA_ARBITRARY=1
      - PHP_DISPLAY_ERRORS=On

    volumes:
      - "../light-changes:/app"


    depends_on:
      - mariadb
      - phpmyadmin


  mariadb:

    image: mariadb:10.4
    restart: always

    networks:
      - dev-net

    volumes:
      - mariadb-data:/var/lib/mysql

    environment:
      MYSQL_ROOT_PASSWORD: mariadb


  phpmyadmin:

    image: phpmyadmin/phpmyadmin:latest

    networks:
      - dev-net

    ports:
      - 8081:80

    environment:
      - PMA_ARBITRARY=1
      - PMA_HOST=mariadb

    depends_on:
      - mariadb


volumes:

  mariadb-data:
```
