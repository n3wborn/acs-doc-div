# Classes PHP



## Déclarer une classe

```php
class NomDeLaClass
{
	// variables publiques
	public $var1 = 1;
	public $var2 = 2;

	// creation d'une methode publique
	public function crier()
	{
		echo "LEEROY JENKINS...";
	}	
}
```


## Créer un nouvel objet (aka nouvelle instance)

```php
$nouvel_objet = new NomDeLaClass();
```


## Récupérer le contenu d'une variable

```php
var_dump($nouvel_objet->var1);
```

**Attention à ne pas placer le signe dollar devant la variable !**


## Utiliser une methode de l'objet

```php
var_dump($nouvel_objet->crier());
```

**Attention à ne pas oublier les parentheses apres la methode !**


## La variable $this

**La variable $this va faire référence à l'instance en cours uniquement.**

```php
{
// Fonction affectant 100 à la var1 de l'instance en cours
public function afficher_var1()
    $this->var1 = 100;
}
```


## Constructeur

Lorsque l'on créé une nouvelle instance d'un objet, lors de sa "construction", on peut lui passer des valeurs en parametre. Cela se fait au travers de la fonction __construct().

```php
{
// On donne des parametres à notre objet, des sa creation
public function __construct($nom)
    $this->nom = $nom;
}
```

On peut désormais donner une valeur à cette variable dès l'instanciation :

```php
$nouvelle_instanciation = NomDeLaClass("ma_classe");
```


## Public et Private

**Ces deux termes vont définir la visibilité (ou la portée, aka scope) de notre variable.**


1. public : **accessible depuis l'extérieur** de la classe
2. private : **accessible qu'à l'intérieur** de la classe
3. protected : **accessible qu'aux classes qui vont hériter** de la classe


## Getter's and Setter's

### Getter's

Quand des variables sont déclarées private, on peut créer des methodes permettant d'obtenir (*get*) la valeur de ces variables

```php
class Personnage
{
    private $surnom;

    public function getSurnom()
    {
        return $this->surnom;
    }
}
```

On peut donc récupérer la valeur de ces variables en procédant ainsi.


### Setter's

Même chose mais pour donner une valeur cette fois (*set*)

```php
class Personnage
{
    private $surnom;

    public function setSurnom($surnom)
    {
        $this->surnom = $surnom;
    }
}
```

On peut donc donner une valeur à une variable privée si sa classe possède ce type de methode.

