<?php

session_start();

if (isset($_POST['connexion']))     //Pour gérer la connexion en mode admin
{
    if ($_POST['mail_user'] === "admin" && $_POST['mdp_user'] === "admin") {
        $_SESSION['admin'] = true;     //On est connecté en mode admin, les vues seront modifiées
        header('location: ../index.php');   //On redirige vers la page d'accueil
    }
    else 
    {
        foreach ($membre as $key => $value) {
            if ($value['mail_user'] === $_POST['mail_user'] && $value['mdp_user'] === $_POST['mdp_user']) {
                $_SESSION['user'] = $value['name'];
            }
        }
    }
}

if (isset($_POST['deconnexion'])) {  //Lorsque l'on se déconnecte
    $_SESSION['admin'] = false; //On est pu en mode admin donc c'est faux
    $_SESSION['user'] = ''; //On met le user à rien
    header('location: ../index.php');    //On redirige vers la page d'accueil
}

$data_file = "../data/membre.json";
$json_membre = file_get_contents("../data/membre.json");
$membre = json_decode($json_membre, true);


