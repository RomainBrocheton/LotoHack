# Génie Logiciel

> **Projet Génie Logiciel**
> Polytech Marseille, 4A
> 
> Romain Brocheton, Michaël Esmieu, Jules Fauvet, Valentin Point
> 

**Ce repository est désormais archivé.**

## Sujet du projet
### Contexte
L'évaluation de la matière Génie Logiciel est réalisée par la réalisation d'un projet dont le principe s'appuie sur l'enseignement dispensé pour cette matière ainsi que sur l'usage du kit documentaire mis à disposition.

Compte tenu de la charge de travail que cela représente et surtout du peu de temps imparti, je conseille les étudiants de s’organiser par groupe composé au maximum de 4 personnes. Les étudiants sans groupe devront m’alerter rapidement afin que je puisse les mettre en relation les uns avec les autres.

La date limite de livraison des documents du projet est fixée au samedi 30 janvier 2021 minuit.

Chaque groupe constitué devra fournir :
* le dossier des spécifications,
* le dossier de la conception,
* le dossier de tests.

Ces documents seront réalisés à partir des modèles fournis dans le kit documentaire. Chaque document sera noté sur 20 et la note finale sera attribuée à chaque membre du groupe.

### Objectifs du projet
Au-delà de l'utilisation du kit documentaire, le projet permet de mettre en oeuvre les fonctionnalités suivantes :
* La création d'IHM,
* L'importation de données,
* L'utilisation d'une base de données,
* La mise en oeuvre de statistiques,
* La mise en oeuvre de modèles mathématiques.

Je rappelle que l'objectif principal du projet est de s'assurer que chaque étudiant soit capable de rédiger un dossier projet complet en vue de sa future carrière en entreprise.

### Langage et base de données utilisées pour le projet
Chaque groupe est libre de choisir :
* le langage de programmation (C, C++, java, ...),
* la base de données (MySQL, Postgres, ...)
* L'outil de modélisation des écrans.

L’utilisation d’environnement de développement intégré (IDE) comme Eclipse, Visual Studio ou autre est autorisé.

S’agissant de la méthode, le choix du cycle en V, d’une méthode Agile ou autre est laissé à la discrétion des groupes. L’essentiel est de respecter le contenu et le
formalisme de chaque dossier.

### Le sujet
Dans le contexte de la crise sanitaire actuelle, il est important de rêver. Le projet consiste à élaborer un logiciel dont l'objectif est de réduire ses pertes financières lorsque l'on joue à des jeux de hasard.

Chaque groupe devra choisir un jeu de hasard parmi ceux proposés par les opérateurs du marché. Le choix de l'opérateur est libre (FDJ, Betclic, Unibet, PMU, etc..) ainsi que le jeu (Loto, Keno, paris sportifs, courses, etc..) à condition que celui-ci dispose d'une base de données (ou un fichier) permettant d'avoir au moins 200 tirages/grilles (pour les analyses statistiques).

Pour être complet, le projet devra :
* disposer d'une interface permettant l'importation des données mis à disposition par l'opérateur. Cette interface offrira la possibilité de télécharger chaque jour des nouvelles données (ou télécharger le dernier fichier mis à disposition par l’opérateur)
* les données seront injectées dans la base de données du logiciel
* disposer d'une interface permettant de réaliser des statistiques (ex : chiffre qui sort souvent, qui sort rarement, etc...). Le groupe projet présentera au minimum 4 types de statistiques différentes.
* disposer d'une interface permettant de réaliser des systèmes réducteurs (je vous invite à consulter sur internet la définition de systèmes réducteurs) ou d’élaborer des grilles mathématiques permettant d’augmenter la potentialité d’un gain par le calcul de combinaisons astucieusement réfléchies.
* disposer d'une interface proposant des grilles à jouer
En option si vous avez le temps, vous pourrez implémenter un module impression permettant d’imprimer directement le/les bulletins à jouer.

Il faudra rester raisonnable afin de pouvoir respecter la date de livraison du projet fixée fin janvier.

### Mise en garde
Ceci est un projet qui doit vous permettre la maitrise de la matière Génie Logiciel. Tant mieux si les raisonnements proposés offrent des résultats probants mais garder à l'esprit que ce n'est pas l'objectif principal.

1er sous-entendu : le gagnant d’un jeu de hasard est toujours l’opérateur.
2ème sous-entendu : vous serez le grand gagnant si vous proposez un projet de qualité

### Répartition des tâches

Romain Brocheton :
* Design
* Architecture du site
* Téléchargement automatique et traitement des fichiers historiques des tirages Loto FDJ

Michal Esmieu :
* Importation SQL
* Statistiques

Jules Fauvet :
* Système réducteur

Valentin Point :
* Impression des grilles
