<?php
$path = '../data/atelier.json';
$atelier = json_decode(file_get_contents($path), true);
if (isset($_POST['reserver'])) {
    $id = $_POST['id'];
    foreach ($atelier as $key => $value) {
        if ($value['Id'] == $id) {
            $atelier[$key]['Places'] = $value['Places'] - 1;
            file_put_contents($path, json_encode($atelier));
        }
    }
}
header('Location: ../index.php');
