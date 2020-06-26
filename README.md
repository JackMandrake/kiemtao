# Kiemtao

On veut créer une interface où chaque utilisateur va pouvoir lire et ajouter des _kiemtaos_ :pray:

## Première version

Toute personne accédant au site peut ajouter un kiemtao.  
Pour faciliter la saisie des kiemtaos, au second ajout, les champs _Username_ et _Email_ seront pré-remplis (avec les valeurs saisies lors du premier ajout)

### #0 Mettre les bons droits sur le fichier des kiemtaos

- dans le terminal
- dans le dossier du projet
- exécuter les commandes suivantes :
  - `sudo chgrp -R www-data data`
  - `sudo chmod -R ug+rwx data`

### #1 Lister les kiemtaos

- les données sont stockées dans un fichier : `data/kiemtaos.php`
- la fonction `loadKiemtaos` retourne la liste de tous les kiemtaos du fichier
- dans le fichier `index.php`
  - récupérer tous les kiemtaos dans une variable `$kiemtaos`
- dans la template `inc/templates/home.tpl.php`
  - parcourir cette variable `$kiemtaos`
  - pour chaque élément
    - générer le code HTML dont l'exemple est fourni
    - remplacer certains textes "en dur" par les données
- 2 kiemtaos (de Dario et Lucie) doivent alors apparaitre

### #2 Ajouter un kiemtao

- après soumission du formulaire d'ajout
- récupérer toutes les données envoyées par le formulaire
- récupérer tous les kiemtaos dans une variable `$kiemtaos`
- ajouter dans ce tableau `$kiemtaos`, un nouveau kiemtao (attention à bien respecter le format du sous-tableau)
- vérifier le contenu de `$kiemtaos` avec un `var_dump` ou `print_r`
  - il doit contenir les anciennes valeurs + la nouvelle
- sauvegarder le tableau dans le fichier `data/kiemtaos.php`
  - c'est exactement ce que fait la fonction `saveKiemtaos`
  - => regarder son code source pour savoir comment l'utiliser
- rediriger vers la page `index.php`

<details><summary>Code PHP pour rediriger vers une page</summary>

```php
// Code pour rediriger vers une page toto.php
header('Location: toto.php');
exit;
```

</details>

### #3 Pré-remplir les champs

Pour garder en mémoire les valeurs des champs _Username_ et _Email_, on va utiliser les cookies.

#### Sauvegarde

- https://www.php.net/setcookie
- après avoir récupéré les données du formulaire
  - créer un cookie pour le _Username_ avec en valeur, ce que l'utilisateur a saisi
  - créer un cookie pour l' _Email_ avec en valeur, ce que l'utilisateur a saisi
- effectuer un test, et regarder dans _DevTools_ si les cookies existent bien, et avec la bonne valeur

#### Récupération

- dans `add.php`
- récupérer les données sauvegardées dans le cookie
  - https://www.php.net/manual/fr/reserved.variables.cookies.php
  - si besoin, faire `var_dump` ou `print_r` de `$_COOKIE` pour vérifier le contenu du tableau
  - stocker les données dans une ou plusieurs variables
- dans la template,
  - utiliser ces variables pour pré-remplir les 2 champs
  - l'attribut `value` permet de donner une valeur à une balise `<input>`
- les champs devraient alors être pré-remplis :tada:

## Deuxième version

- On peut facilement modifier le contenu du cookie
- Actuellement, on peut se faire passer pour qui on veut
- Il faudrait sécuriser tout ça avec un connexion uniquement pour les utilisateurs autorisés
- [C'est par ici](v2.md)
# kiemtao
