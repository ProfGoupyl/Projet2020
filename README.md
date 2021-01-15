# Projet2020
Projet web dynamique groupe 2020-2021

Pour installer la base de données, créez une db que vous nommerez projet2020_db et lancez les migrations Laravel.

Pour ceux qui ont déjà installé la base de données et fait les migrations faites d'abord:
php artisan migrate:reset
pour tout réinitialiser

Pout tous le monde faites dans le terminal 
php artisan migrate
et pour peupler les tables faites
php artisan db:seed

Pour plus d'infos sur comment faire une migration Laravel ?

https://www.youtube.com/watch?v=uJUJqn7V8pk&ab_channel=Grafikart.fr

N'oubliez pas de bien configurer le ficher .env

Les commandes GIT que vous devez absolument connaître !
https://www.hostinger.fr/tutoriels/commandes-git/

FRONT-END

Pour tester les fonctionnalités en tant qu'étudiant vous devez tout d'abord vous créez un compte via la page /register.
Ensuite, rendez-vous dans la db dans la table users_cours, là vous pouvez éditer la/les ligne(s) que vous souhaitez en remplaçant
le contenu du champs user_id par l'id du compte que vous avez créé précédement.
Après avoir fait ça, vous pouvez vous connecter sur votre compte fraichement créé via la page /login, si tout marche bien
vous devriez voir une liste de cours en fonction du nombres de lignes que vous avez édité dans la db.