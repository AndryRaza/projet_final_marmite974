<?php 
/**************************Ajouter un membre "particulier" dans le fichier membre.json********************************/

/**
 * on récupère le fichier json puis on le décode en php
 */
$path = '../data/atelier.json';
$json = file_get_contents("../data/atelier.json");
$atelier = json_decode($json, true);



    // lors de l'envoie du formulaire on fait une vérification que c'est bien une image etc.
if (isset($_POST['ajout_atelier'])) {
    // vérification image et upload
{
    //taille MAX 
    $maxSize = 1000000;
    //format autorisé
    $validExt = array('.jpg', '.jpeg', '.gif', '.png');
    //message d'erreur
    if($_FILES['formFileSm']['error'] > 0 )
    {
      Echo "Erreur pas d'image séléctionner!";
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
    $fileName = "../ressources/" . $fileName ;
    //envoie de l'image que l'on récupere dans le dossier temporaire pour le mettre dans le dossier Ressources
    $resultat = move_uploaded_file($tmpName, $fileName);
    //si le fichier a bien été transferer un message apparait et vous renvoie sur le formulaire d'ajout
    if($resultat)
    {
      Echo "Transfert terminé";
      header ("Location:../pages/formulaire_ajout.php");
    }
}

//si le bouton ajouter est actioner
        $id_atelier = "article_" . md5(uniqid(rand(), true));
        $_POST["id"] = $id_atelier;
    // on créé un tableau avec les nouvelles données fournis par l'utilisateur 
    $newatelier = array(
        "Id" => $_POST['id'],
        "Titre" => $_POST['titre'],
        "Description" => $_POST['Description'],
        "Date" => array($_POST['Day'],$_POST['Mois'],$_POST['Year']),
        "DebutHoraire" => $_POST['debut_horaire'],
        "Image" => $fileName,
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



?>