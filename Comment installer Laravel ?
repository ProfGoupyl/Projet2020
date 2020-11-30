Installation de laravel

Prérequis

Laravel utilise Composer pour gérer ses dépendances. Donc, avant d'utiliser Laravel, assurez-vous que Composer est installé sur votre machine.
https://getcomposer.org/download/
Composer fonctionne en ligne de commande. Vous avez donc besoin de la console (nommée Terminal ou Konsole sur OS X et Linux).

Installation avec composer

Il y a plusieurs façons de créer une application Laravel. La plus classique consiste à utiliser la commande create-project de composer. 
Par exemple je veux créer une application dans un dossier laravel8 à la racine de mon serveur, voici la syntaxe à utiliser :
composer create-project --prefer-dist laravel/laravel laravel8
L’installation démarre et je n’ai plus qu’à attendre quelques minutes pour que Composer fasse son travail jusqu’au bout.
On peux vérifier que tout fonctionne bien avec l’URL http://localhost/laravel8/public.

Installation avec Laravel Installer

Une autre solution pour installer Laravel  consiste à utiliser l’installeur. Il faut commencer par installer globalement l’installeur avec Composer :
composer global require laravel/installer
Pour Windows il faut ensuite informer la variable d’environnement path de l’emplacement du dossier %USERPROFILE%\AppData\Roaming\Composer\vendor\bin.
Pour créer une application il suffit de taper :
laravel new monappli
Laravel sera alors installé dans le dossier monappli.

CONFIGURATION DANS LARAVEL: à la racine de votre dossier Laravel il y a un fichier qui s'appel .env
Dans ce fichier il faudra adapter les paramètres à vos données.
Touver ces lignes dans le fichier .env et modifiez les avec vos paramètres

DB_CONNECTION=mysql 
DB_HOST=127.0.0.1 
DB_PORT=3306 
DB_DATABASE=laravel <--"nom de votre base de données"
DB_USERNAME=root <--"votre username"
DB_PASSWORD=  <--"votre mot de passe si vous en avez un"

Source: https://laravel.sillo.org/cours-laravel-8-les-bases-installation-et-organisation/
