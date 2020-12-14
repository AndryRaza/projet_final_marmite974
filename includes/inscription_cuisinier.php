<?php

session_start();

$path = '../data/membre.json'; //chemin du fichier à traiter
$json = file_get_contents("../data/membre.json"); //ouvre le fichier
$cuisinier = json_decode($json, true); //traduire les données en php 
/* rècupère les données ( A chaque inscription d'un cuisinier) et les affiches ds un tableau. */

//fonction de validation des données de chaque champ
function validation($donnees)
{
  // trim supprime les espaces, les retours à la ligne, les tabulations et autres "blanc"
  $donnees = trim($donnees);
  // stipslashes supprime les anti slash présent dans la chaîne 
  $donnees = stripslashes($donnees);
  // htmlsprecialchars convertit les caractères spéciaux en entités html
  $donnees = htmlspecialchars($donnees);
  return $donnees;
};

if (isset($_POST['inscription_cuisinier'])) {
  /*tableau d'inscri*/
  /* $confirm = password_hash(validation($_POST['confirm_particulier']), PASSWORD_DEFAULT); */
  $newcuisinier = array( //stock ds un tableau temporaire les données du newcuisinier

    "name" => validation($_POST['nom_du_cuisinier']),
    "prenom" => validation($_POST['prenom_du_cuisinier']),
    "mail" => validation($_POST['email_du_cuisinier']),
    "specialite" => validation($_POST['specialite_du_cuisinier']),
    "statut" => $_POST['statut_cuisinier'],
    "id" => uniqid("cui"),
    "password" => $_POST['password_cuisinier']

  );
  // on vérifie que les champs ne sont pas vides puis qu'ils correspondent bien au regex et pour le mail on utilise un filtre qui valide ou non l'adresse
  if (!empty($newcuisinier['name'])  && preg_match('#(^[\w+]+)$#', $newcuisinier['name'])  && !empty($newcuisinier['prenom'])  && preg_match('#(^[\w+]+)$#', $newcuisinier['prenom']) && preg_match('#(^[\w+]+)$#', $newcuisinier['specialite']) && !empty($newcuisinier['mail']) && filter_var($newcuisinier['mail'], FILTER_VALIDATE_EMAIL) && !empty($newmembre['password'])) {

    /*vérification si le tableau n est pas vide*/
    if ($cuisinier == null) {

      $firstcuisinier = array(); //creer un new tableau vide 
      /*empile les données */
      array_push($firstcuisinier, $newcuisinier); //stockage du newclient dans le new-array
      /*regroupe les donnés json*/
      file_put_contents($path, json_encode($firstcuisinier)); /*mise à jour du fichier en json*/
    } else {
      array_push($cuisinier, $newcuisinier); /* si un fichier json existe deja, ces membres vont etre rajouter dans le fichier existant*/
      file_put_contents($path, json_encode($cuisinier)); /*inscri les données en json en suivant le chemin */
    }

    $_SESSION['reussite_cuisinier'] = true;
  } else {
    $_SESSION['erreur_cuisinier'] = true;
  }


  header('location:../pages/formulaire_inscription_cuisinier.php'); // redirection sur la page 'formulaire_inscription' apres avoir envoyer nos informations.
  exit();
}
