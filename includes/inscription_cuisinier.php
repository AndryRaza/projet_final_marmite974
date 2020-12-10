<?php 
/**************************Ajouter un membre "particulier" dans le fichier membre.json********************************/
$lectureBDD= json_decode(file_get_contents('../data/membre.json'), true);

print_r($lectureBDD);

echo'<pre>';
print_r($lectureBDD);
echo'<pre>'

?>
<?php

$path='../data/membre.json';
$json= file_get_contents("../data/membre.json");
$cuisinier=json_decode($json, true);

if (isset($_POST['inscription_cuisinier'])) {

$newcuisinier = array(
    "name" => $_POST['nom_du_cuisinier'],
   "prenom"=> $_POST ['prenom_du_cuisinier'], 
   "telephone"=> $_POST ['telephone_cuisinier'],
    "statut"=> $_POST['specialite_du_cuisinier'],
    "mail" => $_POST['email_du_cuisinier'], 

 );
}