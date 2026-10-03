Skullvi Talent Engine

Solution web de réception, qualification et classement des candidatures
Skullvi Talent Engine est une application web développée dans le cadre d’un exercice de présélection pour le programme Human Capital Program (HCP) de SKULLVI / GevConsulting.

L’objectif est de proposer une première solution fonctionnelle permettant de :
recevoir des candidatures 
collecter les informations essentielles des candidats 
valider les données saisies 
calculer automatiquement un score de qualification 
attribuer un niveau de priorité 
classer les candidatures 
permettre à l’équipe de recrutement de consulter et traiter les profils.

Problématique

Lorsqu’un grand nombre de candidatures est reçu, l’analyse manuelle de chaque profil peut prendre du temps et rendre difficile l’identification rapide des candidatures à examiner en priorité.

Skullvi Talent Engine propose donc un processus simple :
«Candidature → Validation → Qualification → Score → Priorité → Revue par le recruteur»
L’objectif n’est pas de remplacer la décision du recruteur, mais de fournir un premier niveau d’aide à la qualification et à l’organisation des candidatures.

Fonctionnalités principales

Côté candidat :
Formulaire de candidature 
Informations personnelles 
Niveau d’études 
Domaine d’études 
Années d’expérience 
Compétences 
Motivation 
Disponibilité 
Téléversement facultatif du CV au format PDF 
Validation des données 
Confirmation après soumission.

Côté recrutement :
Authentification de l’administrateur 
Tableau de bord des candidatures 
Classement par score 
Statistiques générales 
Consultation détaillée d’une candidature 
Visualisation du détail du score 
Téléchargement sécurisé du CV 
Modification du statut d’une candidature.

Logique de qualification

Chaque candidature reçoit automatiquement un score sur 100 points.
Critère| Maximum
Niveau d’études| 20 pts
Expérience| 20 pts
Compétences| 30 pts
Disponibilité| 15 pts
Motivation / complétude| 15 pts
Total| 100 pts
Niveau d’études
Niveau| Score
Master / Bac+5| 20
Licence / Bac+3| 15
Bac+2| 10
Bac| 5

Expérience

La règle appliquée est :
4 points par année d’expérience, avec un maximum de 20 points.
Pour ce prototype, le formulaire accepte de 0 à 5 années d’expérience.
Compétences

Le système recherche plusieurs groupes de compétences techniques reconnus et attribue :
3 points par groupe identifié, avec un maximum de 30 points.
Les compétences prises en compte comprennent notamment :
PHP
Laravel
Python
Django
JavaScript
TypeScript
HTML
CSS
Tailwind CSS
Bootstrap
React
Vue
Angular
Next.js
Node.js
Express
Java
C#
MySQL
PostgreSQL
MongoDB
Git / GitHub / GitLab
Docker
API / REST

Cette détection est volontairement simple et basée sur des mots-clés. Elle constitue un premier filtre, et non une analyse sémantique complète du CV.

Disponibilité
Disponible : 15 points
Non disponible : 0 point

Motivation
Le système mesure principalement la complétude du texte de motivation, à partir de sa longueur.
Cette mesure ne prétend pas déterminer automatiquement la qualité réelle d'une motivation.

Niveau de priorité
Le score obtenu détermine automatiquement une priorité :
Score| Priorité
80 – 100| Haute
60 – 79| Moyenne
0 – 59| Faible
Cela permet au recruteur d'identifier rapidement les candidatures nécessitant une première revue.

Statuts des candidatures

Chaque candidature peut évoluer entre plusieurs statuts :
Nouvelle
En cours d'examen
Présélectionnée
Rejetée
Le score et la priorité servent à faciliter la première analyse, tandis que le statut permet au recruteur de gérer l’avancement réel du processus.

Architecture simplifiée
L'application suit une architecture Laravel classique :
Candidate
    │
    ├── Informations personnelles
    ├── Formation
    ├── Expérience
    ├── Compétences
    ├── Motivation
    └── CV
          │
          ▼
CandidateScoringService
          │
          ├── Score formation
          ├── Score expérience
          ├── Score compétences
          ├── Score disponibilité
          └── Score motivation
          │
          ▼
Application
          │
          ├── Score total
          ├── Priorité
          └── Statut
          │
          ▼
Dashboard recruteur
La logique de calcul est isolée dans un service dédié :
"app/Services/CandidateScoringService.php"
Cela permet de faire évoluer les règles de qualification sans mélanger cette logique avec le contrôleur.

Technologies utilisées
Backend
PHP 8.5
Laravel 13
MySQL 8.4
Frontend
Blade
HTML
CSS
JavaScript
Outils
Composer
npm
Git
GitHub
WAMP / MySQL pour l’environnement local

Validation et gestion des erreurs
Les données envoyées par le candidat sont validées avant leur enregistrement.

Quelques exemples :
champs obligatoires 
adresse e-mail valide 
e-mail unique 
niveau d'études contrôlé 
expérience comprise entre 0 et 5 ans 
motivation comprise entre 80 et 3000 caractères 
CV limité au format PDF 
taille maximale du CV : 5 Mo.

Les opérations importantes sont également exécutées dans une transaction afin d'éviter d'enregistrer une candidature sans son résultat de qualification.

Sécurité

Plusieurs précautions ont été prises pour ce prototype :

accès au dashboard protégé par authentification 
identifiants administrateur stockés dans les variables d'environnement 
CV stockés dans un espace privé et non directement accessible publiquement 
téléchargement du CV effectué via une route protégée 
validation des données côté serveur 
protection CSRF des formulaires Laravel 
utilisation de l'ORM Eloquent pour les opérations sur la base de données.

Limites connues
Il s'agit volontairement d'un prototype de présélection.
Pour une mise en production à grande échelle, il serait notamment pertinent d'ajouter :
une authentification administrateur plus complète 
une limitation des tentatives de connexion 
une gestion de plusieurs recruteurs et rôles 
une journalisation des actions 
une politique de conservation et de suppression des CV 
une gestion plus avancée des fichiers 
une configuration de stockage adaptée à la production.

Tests
Le projet contient des tests automatisés couvrant notamment l'accessibilité des principales pages et le fonctionnement attendu de l'application.
État actuel :
15 tests passés — 41 assertions
Pour exécuter les tests :
php artisan test

Installation locale
Prérequis
PHP 8.5 ou compatible avec le projet
Composer
MySQL
Node.js / npm
Git
Cloner le projet
git clone https://github.com/stephanemwamba46-ship-it/skullvi-talent-engige.git
cd skullvi-talent-engine
«Le dépôt GitHub utilise actuellement le nom "skullvi-talent-engige".»
Installer les dépendances PHP
composer install
Installer les dépendances frontend
npm install
Configurer l'environnement
Créer le fichier ".env" à partir de ".env.example" :
cp .env.example .env
Puis configurer les informations de connexion à MySQL.
Configurer également les variables nécessaires à l'authentification administrateur.
Générer la clé Laravel
php artisan key:generate
Préparer la base de données
php artisan migrate
Compiler les assets
npm run build
Lancer l'application
php artisan serve
L'application sera alors accessible sur l'adresse locale fournie par Laravel.

Utilisation
Candidat
Accéder à :
/candidature
Remplir le formulaire puis envoyer la candidature.
Le système :
valide les informations ;
enregistre le candidat ;
calcule automatiquement les différents scores ;
calcule le score total ;
attribue une priorité ;
crée la candidature dans le système.
Recruteur

Accéder à :
/login
Après authentification, le recruteur peut accéder au :
/dashboard
Il peut ensuite consulter les candidatures, analyser les scores, télécharger les CV et modifier leur statut.
Utilisation de l'intelligence artificielle
L'intelligence artificielle a été utilisée comme outil d'assistance au développement, notamment pour :
réfléchir à certaines structures techniques 
vérifier et améliorer certains éléments de code 
identifier des erreurs 
proposer des pistes de tests 
améliorer la documentation.

Les choix finaux, l'intégration, les tests, la configuration de l'environnement et la validation du fonctionnement de l'application ont été réalisés dans le cadre du développement du projet.
L'IA n'est pas utilisée par l'application pour prendre automatiquement une décision de recrutement.
Projet personnel présenté
Plateforme web de gestion des malades — Hôpital Saint Joseph
Problématique
Le projet consiste à concevoir une plateforme web permettant d'améliorer la gestion des informations liées aux patients d'une institution hospitalière.

Mon rôle
Conception et développement de la solution.

J'ai travaillé notamment sur :
l'analyse du besoin 
la modélisation des données 
la conception de l'application 
le développement backend 
la gestion de la base de données 
les interfaces de l'application 
l'intégration des différentes fonctionnalités.

Technologies
PHP
Laravel
Tailwind CSS
PostgreSQL / MySQL

Ce projet constitue mon projet académique de fin de cycle en informatique de gestion à HEC-Kinshasa (ex-ISC).
Ce que le projet démontre

À travers Skullvi Talent Engine, l'objectif était de démontrer ma capacité à :
comprendre un besoin métier 
transformer ce besoin en fonctionnalités concrètes 
structurer des données 
concevoir une logique de qualification 
développer une application web fonctionnelle 
gérer les validations et les erreurs 
protéger des données sensibles 
écrire et exécuter des tests 
documenter une solution 
utiliser Git pour le suivi du développement.

État du projet
Version prototype fonctionnelle — prête pour démonstration et tests.
Le projet a été conçu volontairement avec un périmètre maîtrisé afin de privilégier :
simplicité + fonctionnalité + cohérence + sécurité de base + évolutivité.

Auteur : 
Stéphane Mwamba
Développeur Web & Mobile 
Conception et développement de solutions numériques
