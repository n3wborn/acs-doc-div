# PHP -- Sessions

PHP met a notre disposition plusieurs fonctions servant a gerer les sessions utilisateurs. Parmis les premieres a connaitre, on  a session_start().

**session_start() doit toujours être placé en premier dans le code**

Il ajoute un header supplémentaire dans lequel il va placer la valeur de la super globale PHPSESSID :

    Set-Cookie: PHPSESSID="clé stockée par défaut"

Il est possible de spécifier un chemin précis (différent de celui par défaut  /var/lib/php/sessions) pour indiquer où l'on veut stocker les différentes sessions. Pour cela on va utiliser la fonction session_save_path().

Les sessions sont stockées par défaut dans /var/lib/php/sessions sous forme de simples fichiers et nommées **sess_caracteres-aleatoires**  où caracteres-aleatoires est donc une suite déterminée de plusieurs caracteres aleatoires de longueur donnée.

Dans ces fichiers peuvent etre stockees des informations dans un format precis (serialise) que voici :

    clé:type:longueur:valeur

Par exemple, si nous voulons garder des infos relatives à l' utilisateur qui a ouvert une session, on va placer dans notre script php ce genre d'instruction :

    $_SESSION['user'] = "John";

Cette instruction aura pour effet d'avoir ces informations stockées sous ce format :

    user:s:4:"John"

On voit là que la clé *user* est associée à une chaine de *4* caracteres *s* de long ayant *John* comme valeur.




