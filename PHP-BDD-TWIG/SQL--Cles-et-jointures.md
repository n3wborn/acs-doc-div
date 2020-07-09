# Jointures SQL -- Rappel

Dans la base de donnees, **pour pouvoir lier deux cles il faut penser a mettre la cle etrangere en INDEX**.

De plus, ce n'est pas parce que la relation *cle primaire -> cle etrangere* sont faites qu'il devient pour autant de se passer des jointures dans nos requetes ! 

Voyons deux exemples de requetes ou l' on veut selectionner en fonction de l'id de colonnes liees par une clee etrangere :

```sql
SELECT nom, prenom, ville from proprietaire INNER JOIN appartement ON proprietaire.id = appartement.proprietaire_id;
```

```sql
SELECT proprietaire.nom AS nom, proprietaire.prenom AS prenom, appartement.ville AS ville FROM proprietaire INNER JOIN appartment AS appart ON proprietaire.id = appartement.proprietaire_id;
```
