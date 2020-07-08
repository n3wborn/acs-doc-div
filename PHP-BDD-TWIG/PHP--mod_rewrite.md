# PHP -- mode_rewrite

## Activation du module apache

```bash
sudo a2enmod rewrite
sudo systemctl restart apache2 
```

## Autoriser la réécriture dans .htaccess

Par exemple, pour rediriger toutes les urls vers index.php

```
RewriteEngine On
RewriteRule . index.php
```

## Configuration d'Apache

On va ensuite indiquer les bonnes directives dans la configuration d' apache

```
<VirtualHost *:80>

ServerAdmin webmaster@localhost
DocumentRoot /var/www/html

# ici j'ajoute la directive indiquant que
# je permet la reecriture d'url

<Directory /var/www/html/ >
    AllowOverride All
</Directory>

...

</VirtualHost>
```

et le redemarrer

```bash
sudo systemctl restart apache2
```

[plus d'infos sur le site d apache](http://httpd.apache.org/docs/current/mod/mod_rewrite.html)