# INFO834_TP1

## Mode d'emploi

Pour pouvoir se connecter, il suffit de lancer le fichier *login.php* et de rentrer un email et un mdp stockés dans la bdd MySql.  

<ins>Exemple connexion refusée :</ins>

![log_faux](https://user-images.githubusercontent.com/93133836/213579206-78e2d688-f770-447c-8e1e-39418e1dd689.png)

<ins>Exemple de connexion réussie --> redirection vers *services.php* :</ins>

![log_true](https://user-images.githubusercontent.com/93133836/213579254-b2207730-256b-4038-b409-6a9863ebb95d.png)

## Vérification nombre de connexions

On peut tester la gestion du nombre de connexions à l'aide du fichier *max_connexion_test.py*

Lors de l'éxecution du fichier, on vérifie d'abord si l'utilisateur s'est déjà connecté au moins une fois.  
Si ce n'est pas le cas, on met la variable du nombre de connexions à 1 et on affecte un timeout à la clé qui gère l'utilisateur.  
Si c'est le cas, on incrémente la variable du nombre de connexions et on vérifie à chaque exécution du fichier si cette variable ne dépasse pas 10 qui est le maximum de connexions autorisés en moins de 10 minutes.  

<ins>Résultat affiché pour 1 connexion en moins de 10 minutes :</ins>

![1_co](https://user-images.githubusercontent.com/93133836/213579307-e9e75782-b70b-4377-8073-a589f6f0d5f6.png)

<ins>Résultat affiché pour 10 connexions en moins de 10 minutes :</ins>

![10_co](https://user-images.githubusercontent.com/93133836/213579333-41883c54-eab5-40e8-8af8-9db6aa205df4.png)

<ins>Résultat affiché pour plus de 10 connexions en moins de 10 minutes :</ins>

![sup_10_co](https://user-images.githubusercontent.com/93133836/213579359-4f0f79fc-37a8-4c7e-abee-ca5a2e38896b.png)

## Problème gestion du maximum de connexion avec la page php

Sur la page *login.php*, à la ligne 31, lorsque je fais appel au fichier python *max_connexion.py* qui fait le lien entre l'utilisateur voulant se connecter et le nombre de connexions maximum autorisés, la connexion reste autorisé même si la limite de connexion est dépassé.
