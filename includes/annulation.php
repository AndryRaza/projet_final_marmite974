<?php 


if (isset($_POST['annuler'])){
    $id_atelier = $_POST['id_atelier']; //On récupère l'id de notre atelier
    $mail_user = $_POST['user'];    //On récupère le membre qui souhaite se désinscrire du cours 

    
    $json = file_get_contents("../data/atelier.json");
    $atelier = json_decode($json, true);

    foreach($atelier as $key => $value){
        if ($value['Id'] === $id_atelier)   //On cherche l'atelier dans notre fichier atelier.json
        {   
            for($i=0; $i<count($atelier[$key]['participant']);$i++){    //On parcourt la liste des participants de celui ci
                if  ($atelier[$key]['participant'][$i] === $mail_user){ //On cherche le membre qui souhaite annuler sa réservation
         
                    unset($atelier[$key]['participant'][$i]);   //On le retire de la liste des participants
                    $atelier[$key]['participant'] = array_values($atelier[$key]['participant']);    //On remet à 0 les index de notre liste
                    $atelier[$key]['Places'] ++;    //On augmente le nombre de places disponibles
                    file_put_contents("../data/atelier.json", json_encode($atelier));   //On enregistre les modifications
                }
            }
       
        }
    }
}

header('Location:../pages/page_atelier_particulier.php');
exit();