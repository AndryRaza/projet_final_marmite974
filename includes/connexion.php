<?php

session_start();
$data_file = "../data/membre.json";
$json_membre = file_get_contents("../data/membre.json");
$membre = json_decode($json_membre, true);

if (isset($_POST['connexion']))     //Pour gérer la connexion en mode admin
{
    if ($_POST['mail_user'] === "admin" && $_POST['mdp_user'] === "admin") {
        $_SESSION['admin'] = true;     //On est connecté en mode admin, les vues seront modifiées

    } else {
        foreach ($membre as $key => $value) {
            if ($value['mail'] === $_POST['mail_user'] && $value['password'] === $_POST['mdp_user']) {
                $_SESSION['user'] = $value['name'];
            }
        }
    }
    header('location: ../index.php'); //On redirige vers la page d'accueil
    exit();
}

if (isset($_POST['deconnexion'])) {  //Lorsque l'on se déconnecte
    $_SESSION['admin'] = false; //On est pu en mode admin donc c'est faux
    $_SESSION['user'] = ''; //On met le user à rien
    session_destroy();
    header('location: ../index.php');    //On redirige vers la page d'accueil
    exit();
}

$data_file = "../data/membre.json";
$json_membre = file_get_contents("../data/membre.json");
$membre = json_decode($json_membre, true);

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
$mdp = password_hash(validation($_POST['mdp_user']), PASSWORD_DEFAULT);
var_dump($mdp);
foreach ($membre as $key => $value) {

    if ($value['mail'] == $_POST['mail_user'] && $value['password'] == $mdp) {
        $_SESSION['statut'] = $value['statut'];
        var_dump('Luffy');
    }
};
var_dump($_POST['mail_user']);
var_dump($value['password']);
var_dump($_POST['mdp_user']);
var_dump($value['mail']);
var_dump($value['statut']);
var_dump($_SESSION['statut']);
//header('Location:../index.php');
/* (foreach $membre as $key => $value)
if ['mail_user'] === $_POST ['mail_user'] && $value['mdp_user'] === $_POST['mdp_user']
{
    $_SESSION['user'] = ['name']
} */
