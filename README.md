# INFO834_TP1

## Mode d'emploi

Pour pouvoir se connecter, il suffit de lancer le fichier *login.php* et de rentrer un email et un mdp stockés dans la bdd MySql.  

<ins>Exemple connexion refusée :</ins>


<ins>Exemple de connexion réussie --> redirection vers *services.php* :</ins>


## Vérification nombre de connexions

On peut tester la gestion du nombre de connexions à l'aide du fichier *max_connexion_test.py*

Lors de l'éxecution du fichier, on vérifie d'abord si l'utilisateur s'est déjà connecté au moins une fois.  
Si ce n'est pas le cas, on met la variable du nombre de connexions à 1 et on affecte un timeout à la clé qui gère l'utilisateur.  
Si c'est le cas, on incrémente la variable du nombre de connexions et on vérifie à chaque exécution du fichier si cette variable ne dépasse pas 10 qui est le maximum de connexions autorisés en moins de 10 minutes.  

<ins>Résultat affiché pour 1 connexion en moins de 10 minutes :</ins>


<ins>Résultat affiché pour 10 connexions en moins de 10 minutes :</ins>


<ins>Résultat affiché pour plus de 10 connexions en moins de 10 minutes :</ins>


## Problème gestion du maximum de connexion avec la page php

Sur la page *login.php*, à la ligne 31, lorsque je fais appel au fichier python *max_connexion.py* qui fait le lien entre l'utilisateur voulant se connecter et le nombre de connexions maximum autorisés, la connexion reste autorisé même si la limite de connexion est dépassé.