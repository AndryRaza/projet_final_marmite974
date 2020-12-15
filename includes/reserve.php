<?php
session_start();

$path = '../data/atelier.json';
$path2 = '../data/membre.json';
$atelier = json_decode(file_get_contents($path), true);
$membre = json_decode(file_get_contents($path2), true);

/**
 * si le bouton reserver est cliqué
 * on compare l'id de la carte à ceux du fichier json
 * quand le bon id est trouvé le nombre de place actuel est décrémenté de 1 
 */
if (isset($_POST['reserver'])) {
  $id = $_POST['id'];
  foreach ($atelier as $key => $value) {
    if ($value['Id'] == $id && $_SESSION['statut'] == 'particulier' && in_array($_SESSION['mail'], $value['participant']) == false) {
      $atelier[$key]['Places'] = $value['Places'] - 1;
      array_push($atelier[$key]['participant'], $_SESSION['mail']);
      file_put_contents($path, json_encode($atelier));
    }
  }

  header('Location: ../index.php#card_'.$id);
exit();
}

