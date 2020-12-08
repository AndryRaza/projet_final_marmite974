# Projet Final : Application Marmite974

## Introduction 

Nous sommes un centre de formation de cuisine qui propose des ateliers à nos élèves à
partir de 12 ans, mais aussi à des particuliers.
Les cours proposés aux particuliers permettent de financer l’achat de matériels et de
matières premières.
C’est la raison pour laquelle nous souhaitons booster cette activité en grâce à une
application web.

## Objectif 

Nous voulons une application web qui permette à des particuliers de s’inscrire aux ateliers
que nous proposons.
Nous voulons tester la viabilité de l’application, c’est pourquoi nous voulons une application
simple dans un premier temps.
Il est à noter qu’il n’est pas nécessaire de se soucier du paiement, car cela se fera sur place
avant le début des ateliers.

## Cibles 

Nos cibles sont les jeunes actifs entre 25 - 35 ans. Des personnes qui veulent apprendre à
cuisiner afin de manger correctement.

## Utilisateurs 

Nous avons identifié 2 types d’utilisateurs.
Cuisinier
Le cuisinier créé les ateliers et les propose aux particuliers.
Il est défini par son nom, prénom, email et spécialité.
Tous les champs sont obligatoires sauf spécialité.
Particulier
Le particulier s’inscrit à un atelier en entrant son nom, prénom, numéro de téléphone et
email.
Il est défini par les champs nom, prénom, téléphone et emails. Tous les champs sont
obligatoires sauf téléphone.
Remarque
Il ne peut avoir 2 utilisateurs avec le même email.


## Les ateliers 

Chaque atelier possède les champs suivants :
- un titre
- une description du contenu de l’atelier
- une date
- l’horaire de début
- la durée
- le nombre de places disponible
- le nombre de places réservées
- le prix
- une image

## Users stories 

| En tant que  |  je veux | afin de | critères d'acceptations |
|--|--|--|---------|
| cuisinier  | désactiver/activer |Rendre visible ou invisible pour les particuliers| - Désactiver l'atelier ne rend plus visible sur la liste des ateliers                                                               - Activer l'atelier le rend visible sur la liste des ateliers   |
| cuisinier | modifier un atelier | changer les informations rentrées précédemment | Les modifications apparaissent dans la liste des ateliers | 
|cuisinier | créer un atelier | proposer à des particuliers | l'atelier nouvellement créé apparaît dans la liste des ateliers |
| cuisinier | avoir une interface d'administration sécurisée | d'être le seul à pouvoir modifier mes ateliers | Le cuisinier accède aux pages sécurisées grâce à un login et un mot de passe. Le cuisinier ne voit que les ateliers qu'il a créés |
| particulier | voir la liste des ateliers | s'inscrire à un atelier |une page qui affiche la liste des ateliers disponibles |
| particulier | m'inscrire à un atelier | de réserver ma place | Lorsqu'un particulier s'inscrit à un atelier le nombre de places réservées de celui | 

## Charte graphique 

### Couleurs

![sparkles](ressources/charte/couleurs.png)

### Font 

Police Roboto 

Police Verdana


