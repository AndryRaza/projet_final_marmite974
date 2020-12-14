<?php
$path = '../data/atelier.json';
$path2 = '../data/membre.json';
$atelier = json_decode(file_get_contents($path), true);
$membre = json_decode(file_get_contents($path2),true);

/**
 * si le bouton reserver est cliqué
 * on compare l'id de la carte à ceux du fichier json
 * quand le bon id est trouvé le nombre de place actuel est décrémenté de 1 
 */
if (isset($_POST['reserver'])) {
    $id = $_POST['id'];
    foreach ($atelier as $key => $value) {
        if ($value['Id'] == $id) {
            $atelier[$key]['Places'] = $value['Places'] - 1;
            file_put_contents($path, json_encode($atelier));
        }
        foreach ($membre as $key2 => $value2) {
            if ($value2['mail'] === $_SESSION['mail']) {
              array_push( $value2['atelier'],$id);
              file_put_contents($path2, json_encode($membre));
            }
          }
    }
  
}
header('Location: ../index.php');
