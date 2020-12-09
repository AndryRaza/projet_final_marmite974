<?php

/**************************Ajouter un membre "particulier" dans le fichier membre.json********************************/

/**
 * on récupère le fichier json puis on le décode en php
 */
$path = '../data/membre.json';
$json = file_get_contents("../data/membre.json");
$membres = json_decode($json, true);

//si le bouton s'inscrire est activé 
if (isset($_POST['inscription_particulier'])) {
    // on créé un tableau avec les nouvelles données fournis par l'utilisateur 
    $newmembre = array(
        "name" => $_POST['nom_particulier'],
        "prenom" => $_POST['prenom_particulier'],
        "telephone" => $_POST['phone_particulier'],
        "mail" => $_POST['mail_particulier'],
        "statut" => $_POST['statut_particulier']
    );

    // on vérifie si le fichier possède des informations ou pas
    if ($membres == null) {
        // on crée un tableau vide si il n'y a pas de données dans le fichier json.
        $firstmembre = array();
        // on place le nouveau client dans le précédent tableau qui lui ira dans le fichier json
        array_push($firstmembre, $newmembre);
        // on inscrit le tout dans le fichier json
        file_put_contents($path, json_encode($firstmembre));
    } else {
        // si les données sont déjà dans le fichier json on ajoute directement le nouveau membre à ceux déjà présent
        array_push($membres, $newmembre);
        // on inscrit le tout dans le fichier json
        file_put_contents($path, json_encode($membres));
    }
}
header('Location:../pages/formulaire_inscription_particulier.html');
