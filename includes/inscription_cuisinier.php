<?php

session_start();

$path='../data/membre.json'; //chemin du fichier à traiter
$json= file_get_contents("../data/membre.json"); //ouvre le fichier
$cuisinier=json_decode($json, true);//traduire les données en php 
/* rècupère les données ( A chaque inscription d'un cuisinier) et les affiches ds un tableau. */ 
if (isset($_POST['inscription_cuisinier'])) {
 /*tableau d'inscri*/
  $newcuisinier = array( //stock ds un tableau temporaire les données du newcuisinier

   "name" => $_POST['nom_du_cuisinier'],
   "prenom"=> $_POST ['prenom_du_cuisinier'], 
   "mail" => $_POST['email_du_cuisinier'], 
   "specialite" => $_POST['specialite_du_cuisinier'],
   "statut"=> $_POST['specialite_du_cuisinier']
   

  );
  /*vérification si le tableau n est pas vide*/
  if ($cuisinier == null ) {

    $firstcuisinier = array();//creer un new tableau vide 
 /*empile les données */
    array_push($firstcuisinier, $newcuisinier);//stockage du newclient dans le new-array
    /*regroupe les donnés json*/
    file_put_contents($path, json_encode($firstcuisinier)); /*mise à jour du fichier en json*/

  }

  else{
  array_push ($cuisinier, $newcuisinier); /* si un fichier json existe deja, ces membres vont etre rajouter dans le fichier existant*/
 file_put_contents($path,json_encode($cuisinier)); /*inscri les données en json en suivant le chemin */ 
  }

$_SESSION['reussite_cuisinier'] = true;

header('location:../pages/formulaire_inscription_cuisinier.php'); // redirection sur la page 'formulaire_inscription' apres avoir envoyer nos informations.
exit();

}
 






