<?php 
/**************************Ajouter un membre "particulier" dans le fichier membre.json********************************/

/**
 * on récupère le fichier json puis on le décode en php
 */
$path = '../data/atelier.json';
$json = file_get_contents("../data/atelier.json");
$atelier = json_decode($json, true);

//si le bouton s'inscrire est actioner
if (isset($_POST['ajout_atelier'])) {
    // on créé un tableau avec les nouvelles données fournis par l'utilisateur 
    $newatelier = array(
        "Titre" => $_POST['titre'],
        "Description" => $_POST['Description'],
        "Date" => array($_POST['Day'],$_POST['Mois'],$_POST['Year']),
        "DebutHoraire" => $_POST['debut_horaire'],
        "Duree" => $_POST['Duree'],
        "Places" => $_POST['Places'],
        "Prix" => $_POST['Prix'],
        

    );

     // on vérifie si le fichier possède des informations ou pas
    if ($atelier == null) {
        // on crée un tableau vide si il n'y a pas de données dans le fichier json.
        $firstatelier = array();
        // on place le nouveau client dans le précédent tableau qui lui ira dans le fichier json
        array_push($firstatelier, $newatelier);
        // on inscrit le tout dans le fichier json
        file_put_contents($path, json_encode($firstatelier));
    } else {
        // si les données sont déjà dans le fichier json on ajoute directement le nouveau membre à ceux déjà présent
        array_push($atelier, $newatelier);
        // on inscrit le tout dans le fichier json
        file_put_contents($path, json_encode($atelier));
    }
} 
header ("Location:../pages/formulaire_ajout.php")
?>