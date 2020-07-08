# Deb Install NodeJs 


##  Recuperer le script d'install et installation

	curl -sL https://deb.nodesource.com/setup_12.x -o nodesource_setup.sh
	sudo bash nodesource_setup.sh
	sudo apt install nodejs

## Creation dossier test

	cd /home/vagrant
	mkdir projetweb
	cd projetweb

## Création d'un index.js

Dans index.js :

	var http = require('http');
	http.createServer(function (req, res) {
	    res.writeHead(200, {'Content-Type': 'text/plain'});
	    res.write('Hello World!');
	    res.end();
	}).listen(3000);


## Install Apache

	sudo apt install apache2

