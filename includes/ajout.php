<?php

/**************************Ajouter un membre "particulier" dans le fichier membre.json********************************/

session_start();

/**
 * on récupère le fichier json puis on le décode en php
 */
$path = '../data/atelier.json';
$json = file_get_contents("../data/atelier.json");
$atelier = json_decode($json, true);



// lors de l'envoie du formulaire on fait une vérification que c'est bien une image etc.
if (isset($_POST['ajout_atelier'])) {
  // vérification image et upload

  if (isset($_FILES['formFileSm'])) {
    //taille MAX 
    $maxSize = 1000000;
    //format autorisé
    $validExt = array('.jpg', '.jpeg', '.gif', '.png');
    //message d'erreur
    if($_FILES['formFileSm']['error'] > 0 )
    {
      Echo "Erreur pas d'image séléctionné!";
      die;
    }

    $fileSize = $_FILES['formFileSm']['size'];

    if ($fileSize > $maxSize)
    {
      Echo "Fichier trop volumineux";
      die;
    }

    //création d'une variable fileName
    $fileName = $_FILES['formFileSm']['name'];
    $fileExt = "." . strtolower(substr(strrchr($fileName, '.'), 1));

    if(!in_array($fileExt, $validExt))
    {
      Echo "Mauvais format de fichier";
      die;
    }
    // Création de la variable nom temporaire qui va récuperer le fichier et le mettre dans un fichier temporaire
    $tmpName = $_FILES['formFileSm']['tmp_name'];
    // Ensuite on crée une variable qui va indiquer un chemin pour placer l'image
    $fileName = "ressources/img/" . $fileName ;
    //envoie de l'image que l'on récupere dans le dossier temporaire pour le mettre dans le dossier Ressources
    $resultat = move_uploaded_file($tmpName, $fileName);
    
  }
  else {
    $fileName = "ressources/img/logo.png";
  }

  

  if (
    isset($_POST['titre'])
    && isset($_POST['Description'])
    && isset($_POST['Day'])
    && isset($_POST['Mois'])
    && isset($_POST['Year'])
    && isset($_POST['debut_horaireH'])
    && isset($_POST['debut_horaireM'])
    && isset($_POST['Duree'])
    && isset($_POST['Places'])
    && isset($_POST['Prix'])
    && $_POST['Prix'] >0
    && $_POST['Places'] >0
    && $_POST['Duree'] >0
    && $_POST['debut_horaireH'] >0
    && $_POST['debut_horaireM'] >=0
  ) {
    //si le bouton ajouter est actioner
    $id_atelier = "atelier_" . md5(uniqid(rand(), true));
    $_POST["id"] = $id_atelier;
    // on créé un tableau avec les nouvelles données fournis par l'utilisateur 
    $newatelier = array(
      "Id" =>  $_POST['id'],
      "Titre" => htmlspecialchars($_POST['titre']),
      "Description" => htmlspecialchars($_POST['Description']),
      "Date" => array($_POST['Day'], $_POST['Mois'], $_POST['Year']),
      "DebutHoraire" => array((int) $_POST['debut_horaireH'], (int)$_POST['debut_horaireM']),
      "Image" =>  $fileName,
      "Duree" => (int)$_POST['Duree'],
      "Places" => (int) $_POST['Places'],
      "Prix" => (int) $_POST['Prix'],
      "etat" => "inactif",
      "createur" => $_SESSION['mail'],
      "participant" => []

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

    $_SESSION['atelier_ajout'] = true;
    header('Location: ../pages/formulaire_ajout.php');
  } else {
    $_SESSION['atelier_ajout_error'] = true;
    header('Location: ../pages/formulaire_ajout.php');
  }
}
