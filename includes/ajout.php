<?php

/**************************Ajouter un membre "particulier" dans le fichier membre.json********************************/

session_start();

/**
 * on récupère le fichier json puis on le décode en php
 */
$path = '../data/atelier.json';
$json = file_get_contents("../data/atelier.json");
$atelier = json_decode($json, true);

include '../includes/fonctions.php';

// lors de l'envoie du formulaire on fait une vérification que c'est bien une image etc.
if (isset($_POST['ajout_atelier'])) {
  
  $dossier = '../ressources/img/';
  $fichier = basename($_FILES['image']['name']);
  $taille_maxi = 1000000;
  $taille = filesize($_FILES['image']['tmp_name']);
  $extensions = array('.png', '.gif', '.jpg', '.jpeg');
  $extension = strrchr($_FILES['image']['name'], '.');

  if (!in_array($extension, $extensions)) {
      $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg';
  }

  if ($taille > $taille_maxi) {
      $erreur = 'Le fichier est trop gros...';
  }

  if ($_FILES['image']['name'] === ' ') {
      $erreur = 'Nom de l\'image incorrect';
  }

  if (stristr($fichier, '<') != FALSE) {
      $erreur = 'Nom de l\'image incorrect';
  }

  if (!isset($erreur)) {
      $fichier = strtr(
          $fichier,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
      );
      $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
      if (move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
      {
          echo '';
      } else //Sinon (la fonction renvoie FALSE).
      {
          $fichier = 'no-image.png';
      }
  } else {
      echo $erreur;
      $fichier = 'no-image.png';
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
      "Date" => correction_date($_POST['Day'],$_POST['Mois'],$_POST['Year'])
      ,
      "DebutHoraire" => array((int) $_POST['debut_horaireH'], (int)$_POST['debut_horaireM']),
      "Image" =>  $fichier,
      "Duree" => (int)$_POST['Duree'],
      "Places" => (int) $_POST['Places'],
      "Places_reservees" => (int) $_POST['Places'],
      "Prix" => (int) $_POST['Prix'],
      "etat" => "Inactif",
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
