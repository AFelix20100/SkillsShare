<!-- <div align="center" id="top"> 
  <img src="./.github/app.gif" alt="SkillsShare" />

  &#xa0; -->

  <!-- <a href="https://skillsshare.netlify.app">Demo</a> -->
<!-- </div> -->

<h1 align="center">SkillsShare</h1>

<p align="center">
  <img alt="Github top language" src="https://img.shields.io/github/languages/top/{{YOUR_GITHUB_USERNAME}}/skillsshare?color=56BEB8">

  <img alt="Github language count" src="https://img.shields.io/github/languages/count/{{YOUR_GITHUB_USERNAME}}/skillsshare?color=56BEB8">

  <img alt="Repository size" src="https://img.shields.io/github/repo-size/{{YOUR_GITHUB_USERNAME}}/skillsshare?color=56BEB8">

  <img alt="License" src="https://img.shields.io/github/license/{{YOUR_GITHUB_USERNAME}}/skillsshare?color=56BEB8">

  <!-- <img alt="Github issues" src="https://img.shields.io/github/issues/{{YOUR_GITHUB_USERNAME}}/skillsshare?color=56BEB8" /> -->

  <!-- <img alt="Github forks" src="https://img.shields.io/github/forks/{{YOUR_GITHUB_USERNAME}}/skillsshare?color=56BEB8" /> -->

  <!-- <img alt="Github stars" src="https://img.shields.io/github/stars/{{YOUR_GITHUB_USERNAME}}/skillsshare?color=56BEB8" /> -->
</p>

<!-- Status -->

<!-- <h4 align="center"> 
	🚧  SkillsShare 🚀 Under construction...  🚧
</h4> 

<hr> -->

<p align="center">
  <a href="#dart-about">A propos</a> &#xa0; | &#xa0; 
  <a href="#sparkles-features">Fonctionnalités</a> &#xa0; | &#xa0;
  <a href="#rocket-technologies">Technologies</a> &#xa0; | &#xa0;
  <a href="#white_check_mark-requirements">Dépendances</a> &#xa0; | &#xa0;
  <a href="#checkered_flag-starting">Démarrage rapide</a> &#xa0; | &#xa0;
  <a href="#memo-license">Licence</a> &#xa0; | &#xa0;
  <a href="https://github.com/{{YOUR_GITHUB_USERNAME}}" target="_blank">Auteurs</a>
</p>

<br>

## :dart: About ##

Notre entreprise s'est récemment vue confier une mission des plus captivantes par un client visionnaire. L'objectif est clair : concevoir un produit web novateur dédié à l'apprentissage en ligne. Avec une ambition de rendre les cours accessibles via internet, ce projet s'inscrit dans la sphère de l'e-learning en plein essor.

## :sparkles: Features ##

:heavy_check_mark: Voir les cours;\
:heavy_check_mark: Voir les cours par catégories;\
:heavy_check_mark: Se connecter;
:heavy_check_mark: Créer un compte;
:heavy_check_mark: Suivre un cours;

## :rocket: Technologies ##

The following tools were used in this project:

- [PHP 8.2](https://www.php.net/downloads)
- [Symfony](https://symfony.com/download)
- [Composer](https://getcomposer.org/download/)
- [Boostrap V5](https://getbootstrap.com/)

## :white_check_mark: Requirements ##

Before starting :checkered_flag:, you need to have [Git](https://git-scm.com) and [Node](https://nodejs.org/en/) installed.

## :checkered_flag: Starting ##

```bash
# Clone this project
$ git clone https://github.com/{{AFelix20100}}/skillsshare

# Access
$ cd skillsshare

# Install dependencies
$ php bin/console migrations:migrate

# Run the project
$ yarn start

# The server will initialize in the <http://localhost:3000>
```
## Git ##
Pour récupérer une branche spécifique d'un dépôt Git, vous pouvez utiliser la commande git clone suivie de l'option --branch pour spécifier le nom de la branche que vous souhaitez cloner. Voici comment cela se présente :
commande: git clone --branch <nom_de_la_branche> <URL_du_dépôt>

## Déploiement ## 

## Avec Docker ##
Docker est une plateforme logicielle qui simplifie le déploiement et la gestion d'applications dans des environnements isolés appelés conteneurs. Ces conteneurs offrent un moyen portable et léger d'emballer des applications avec toutes leurs dépendances, garantissant ainsi une exécution cohérente indépendamment de l'environnement hôte.

Les conteneurs Docker fonctionnent sur la base d'images, des modèles immuables et auto-suffisants qui contiennent le code, les bibliothèques, les outils, et toutes les autres dépendances nécessaires à l'exécution d'une application.

Maintenant, voici quelques commandes essentielles pour travailler avec Docker :
```bash
$ sudo docker-compose up 
# Cette commande lance des services définis dans un fichier docker-compose.yml. Elle crée et démarre des conteneurs en fonction de la configuration spécifiée.

$ sudo docker-compose down
# Ceci arrête et supprime les conteneurs, les réseaux, les volumes et les images créés par docker-compose up.

$ sudo docker ps 
# Cette commande affiche les conteneurs actuellement en cours d'exécution avec des informations telles que leur ID, leur nom et leur statut.

$ sudo docker exec -it <container_id> /bin/bash 
# Vous permet de vous connecter à l'intérieur d'un conteneur en cours d'exécution pour exécuter des commandes ou effectuer des opérations dans son environnement.
```
## Processus avec Docker ##
1. Cloner le dépôt Git :
     Commencez par récupérer le dépôt Git avec la commande git clone --branch <nom_de_la_branche> <URL_du_dépôt>.
2. Transférer le fichier compressé vers le serveur web :
     Une fois le dépôt cloné, transférez le fichier compressé siteweb.zip vers le serveur web.
3. Décompresser le fichier à la racine du serveur :
     Utilisez la commande $ sudo apt install unzip ensuite $ sudo unzip siteweb.zip -d /home/debian && sudo mv /home/debian/siteweb/* /home/debian/ && sudo rm -r /home/debian/siteweb
 pour extraire le contenu du fichier siteweb.zip dans la racine du système. Assurez-vous d'avoir les permissions nécessaires pour écrire à la racine du système. ensuite rentrer dans le dossier site web et faite la commande.
   
4. Placer les fichiers spécifiques au bon endroit :
     Vérifiez que les fichiers apache-config.conf, docker-compose.yml et Dockerfile sont extraits dans le même répertoire (la racine du serveur). Ces fichiers doivent être situés au même endroit pour leur bon fonctionnement.
	
5. Lancer Docker avec docker-compose :
     Utilisez la commande sudo docker-compose up -d pour démarrer les conteneurs définis dans le fichier docker-compose.yml. Assurez-vous d'exécuter cette commande dans le répertoire contenant le fichier docker-compose.yml.
   
Ces étapes vous permettront de cloner un dépôt Git, transférer un fichier compressé sur un serveur web, extraire son contenu à la racine du serveur, puis lancer Docker avec docker-compose pour déployer l'application en utilisant les fichiers de configuration appropriés. Assurez-vous de respecter les permissions nécessaires et les chemins appropriés pour que tout fonctionne correctement. 

## :memo: License ##

This project is under license from MIT. For more details, see the [LICENSE](LICENSE.md) file.


Made with :heart: by <a href="https://github.com/{{YOUR_GITHUB_USERNAME}}" target="_blank">{{YOUR_NAME}}</a>

&#xa0;
<a href="#top">Back to top</a>
