<!--Ici on gere la modification de l'état de l'enchere si on actionne le bouton activer ou desactiver -->
<?php 
$path = '../data/atelier.json';
$json = file_get_contents("../data/atelier.json");
$atelier = json_decode($json, true);
if(isset($_POST['submit_activer'])){ // si le bouton activer est actionner
    $id = $_POST['indice'];//On stock dans l'input du nom indice l'id en valeur mais il est en display none afin de ne pas passer par l'url
    
    foreach ($atelier as $key => $value){//pour chaque enchere on va chercher quel endroit du tableau se trouve celui dont on veut modifier selon l'id
        if($value['Id'] == $id){
            $atelier[$key]['etat'] =  'actif'; //A l'emplacement (key) du tableau on change l'etat qui est actif et la date de fin en secondes
            file_put_contents($path, json_encode($atelier));
        }
    }
}
if(isset($_POST['submit_desactiver'])){ //Si le bouton désactiver est actionner
    $id = $_POST['indice'];
    foreach ($atelier as $key => $value){
        if($value['Id'] == $id){ // Compare les id pour récuperer la bonne ID
          $atelier[$key]['etat'] =  'inactif'; //A l'emplacement (key) du tableau on change l'etat en inactif
          file_put_contents($path, json_encode($atelier));
        }
    }
}
?>