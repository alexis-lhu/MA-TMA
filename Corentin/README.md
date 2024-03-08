## WebLearning Turbo
 Plateforme de peer-learning pour l'EPSI Lille.

#  Fichiers
# header.php
Ce fichier contient le code HTML pour l'en-tête de la page, qui comprend le titre du site et un sous-titre. Il est inclus dans chaque page à l'aide de la fonction require.

#  footer.php
Ce fichier contient le code HTML pour le pied de page de la page, qui comprend le copyright. Il est inclus dans chaque page à l'aide de la fonction require.

# index.php
Cette page est la page d'accueil du site. Elle affiche une image, le nom et le groupe de l'étudiant, ainsi qu'un lien vers la page d'upload de fichier. Elle inclut également l'en-tête et le pied de page à l'aide de la fonction require.

# systemeUpload.php
Ce fichier PHP gère l'upload de fichiers. Il vérifie que le fichier est une image ou un fichier PDF, qu'il n'existe pas déjà sur le serveur et qu'il ne dépasse pas une certaine taille. Il déplace ensuite le fichier téléchargé vers le dossier uploads.

# uploadForm.php
Cette page contient le formulaire d'upload de fichier. Elle inclut également l'en-tête et le pied de page à l'aide de la fonction require.

# style.css
Ce fichier contient le code CSS pour le style de la page. Il définit un dégradé radial pour le fond de la page, et des styles pour le conteneur, le corps de la page, les images et le formulaire d'upload.

## Lancer le projet en local
Pour lancer le projet en local, suivre les étapes suivantes :

Cloner le dépôt Git sur votre ordinateur local.
Ouvrir le dossier du projet dans un éditeur de code.
Créer un dossier uploads à la racine du projet.
Lancer un serveur local (par exemple, avec XAMPP ou WAMP).
Taper php -S localhost:80 dans la console pour lancer le projet en local.
Ouvrir le fichier index.php dans un navigateur web.