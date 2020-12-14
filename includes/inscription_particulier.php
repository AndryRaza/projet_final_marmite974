<?php
session_start();
/**************************Ajouter un membre "particulier" dans le fichier membre.json********************************/

/**
 * on récupère le fichier json puis on le décode en php
 */
$path = '../data/membre.json';
$json = file_get_contents("../data/membre.json");
$membres = json_decode($json, true);

// fonction pour valider les données 
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


//si le bouton s'inscrire est activé 
if (isset($_POST['inscription_particulier'])) {
    // on créé un tableau avec les nouvelles données fournis par l'utilisateur 
    $newmembre = array(
        "nom" => validation($_POST['nom_particulier']),
        "prenom" => validation($_POST['prenom_particulier']),
        "telephone" => validation($_POST['phone_particulier']),
        "mail" => validation($_POST['mail_particulier']),
        "statut" => $_POST['statut_particulier'],
        "id" => uniqid("par"),
        "password" => validation($_POST['password'])
    );


    // on vérifie que les champs ne sont pas vides puis qu'ils correspondent bien au regex et pour le mail on utilise un filtre qui valide ou non l'adresse
    if (!empty($newmembre['nom'])  && preg_match('#(^[\w+]+)$#', $newmembre['nom'])  && !empty($newmembre['prenom'])  && preg_match('#(^[\w+]+)$#', $newmembre['prenom']) && preg_match('#(^[0-9]+)$#', $newmembre['telephone']) && !empty($newmembre['mail']) && filter_var($newmembre['mail'], FILTER_VALIDATE_EMAIL) && !empty($newmembre['password'])) {

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
        $_SESSION['reussite'] = true;
    } else {
        $_SESSION['erreur'] = true;
    }
}


header('Location:../pages/formulaire_inscription_particulier.php');
