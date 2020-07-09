# MariaDB -- Installation

## Doc

[repos](https://downloads.mariadb.org/mariadb/repositories/)

## Installation

Pour installer MariaDB on va procéder en plusieurs etapes.

### Installation des dépendances et ajout du repo officiel

```bash
sudo apt-get install software-properties-common
sudo apt-key adv --fetch-keys 'https://mariadb.org/mariadb_release_signing_key.asc'
sudo add-apt-repository 'deb [arch=amd64,arm64,ppc64el] http://mariadb.mirror.pcextreme.nl/repo/10.4/ubuntu focal main'
```

### Mise a jour des repos et installation de MariaDB

```bash
sudo apt update
sudo apt install mariadb-server
```

### Securisation de l'installation

```bash
sudo mysql_secure_installation
```
