<?php

/**************************Pour afficher les cartes, réserver********************************/

function affichage_atelier()
{
  $path = '../data/atelier.json'; //chemin du fichier à traiter
  $json = file_get_contents("data/atelier.json"); //ouvre le fichier
  $atelier = json_decode($json, true); //traduire les données en php 
  $expire = false;


  foreach ($atelier as $key => $value) {
    setlocale(LC_TIME, 'fra_fra'); // pour afficher la date en français

    /**
     * le mois indiqué dans Date est associé à un chiffre
     * afin de pouvoir le comparer au mois actuel
     */
    if ($value['Date'][1] == 'Janvier') {
      $mois = 1;
    }
    if ($value['Date'][1] == 'Fevrier') {
      $mois = 2;
    }
    if ($value['Date'][1] == 'Mars') {
      $mois = 3;
    }
    if ($value['Date'][1] == 'Avril') {
      $mois = 4;
    }
    if ($value['Date'][1] == 'Mai') {
      $mois = 5;
    }
    if ($value['Date'][1] == 'Juin') {
      $mois = 6;
    }
    if ($value['Date'][1] == 'Juillet') {
      $mois = 7;
    }
    if ($value['Date'][1] == 'Aout') {
      $mois = 8;
    }
    if ($value['Date'][1] == 'Septembre') {
      $mois = 9;
    }
    if ($value['Date'][1] == 'Octobre') {
      $mois = 10;
    }
    if ($value['Date'][1] == 'Novembre') {
      $mois = 11;
    }
    if ($value['Date'][1] == 'Decembre') {
      $mois = 12;
    }

    /**
     * on compare le mois et l'année actuel 
     * au mois et à l'année du fichier 
     * si la date actuel est supérieur alors 
     * l'atelier a expiré et donc indisponible
     */
    if (strftime('%m') > $mois && strftime('%Y') >= $value['Date'][2]) {
      $expire = true;
    } elseif (strftime('%d') >= $value['Date'][0] && strftime('%m') == $mois && strftime('%Y') == $value['Date'][2]) {
      $expire = true;
    }
    /**
     * la deuxième partie concerne la cas ou mois et année
     * sont identiques à la date actuelle 
     * c'est donc le jour qui va faire la différence 
     */

   if ($value['etat'] == "actif") : ?>
      <!-- affiche que les cartes actives -->
      <div class="card shadow m-lg-3" style="width: 20rem;">

        <div class="position-relative image-container">
          <div class=" position-absolute  top-0 start-0 font-weight-bold bg-primary text-white"style="font-size:20px">À partir du <br><?php echo /*affiche la date */ implode(' ', $value['Date']) ?> </div>
          <div class="position-absolute bg-primary text-white font-weight-bold" style="bottom:0;font-size:23px">
            <?php if ($expire == true) {
              echo 'Expiré';
            } elseif ($value['Places'] > 0) {
              echo $value['Places'] . ' place(s) restante(s)';
            } else {
              echo 'Complet';
            }  ?>
          </div>
          <img src="ressources\charte\plat2.jpg" class="card-img-top" text="Date" alt="plat" height="300px" width="200px">

        </div>
        <div>
          <p class="card-text"> Durée : <?php echo $value['Duree'] ?> jours</p>
          <h4 class="card-title ml-auto text-center"><?php echo $value['Titre'] ?></h4>
        </div>
        <div class="card-body">
          <div class="barre"></div>
          <p class="card-text"><?php echo $value['Description'] ?></p>

          <div class="d-flex justify-content-between">
            <p class="card_text mt-2 ml-auto" style="font-size:40px"><?php echo $value['Prix'] ?>€</p>
            <form action="includes/reserve.php" method="POST">
              <input type="hidden" value="<?php echo $value['Id'] ?>" name="id">
              <?php
              if ($expire == true) {
              ?>
                <input class="btn btn-primary d-flex justify-content-right  ml-auto" type="submit" name="reserver" value="Terminé" disabled>
              <?php
              } elseif ($value['Places'] > 0) {
              ?>
                <input class="btn btn-primary d-flex justify-content-right  ml-auto mt-4" type="submit" name="reserver" value="Réserver">
              <?php
              } else {
              ?>
                <input class="btn btn-primary d-flex justify-content-right  ml-auto" type="submit" name="reserver" value="Complet" disabled>
              <?php
              }
              ?>
            </form>

          </div>
        </div>
      </div>
    <?php endif ?>
<?php
  }
}

?>

<?php

function affichage_membre()
{

  $json = file_get_contents("../data/membre.json"); //ouvre le fichier
  $membre = json_decode($json, true); //traduire les données en php 

  foreach ($membre as $key => $value) { ?>
    <tr>
      <td class="text-center">
        <p class="pt-5"><?= $value['nom'] ?></p>
      </td>
      <td class="text-center">
        <p class="pt-5"><?= $value['statut'] ?></p>
      </td>
      <td class="text-center">
        <p class="pt-5"><?= $value['mail'] ?></p>
      </td>
      <?php if ($value['statut'] === 'cuisinier') { ?>
        <td class="text-center">
          <p class="pt-5"><?= $value['specialite'] ?></p>
        </td>
      <?php  } else { ?>
        <td class="text-center">
          <p class="pt-5"><?= $value['telephone'] ?></p>
        </td>
    <?php }
    }
    ?>
    </tr>
    <?php
  }


  function affichage_atelier_particulier()
  {
    $json = file_get_contents("../data/membre.json"); //ouvre le fichier
    $membre = json_decode($json, true); //traduire les données en php 

    $json2 = file_get_contents("../data/atelier.json");
    $atelier = json_decode($json2, true);

    foreach ($atelier as $key => $value) {
      if (in_array($_SESSION['mail'],$atelier[$key]['participant'] )) {

    ?>
        <tr>
          <td class="text-center">
            <p class="pt-5"><?= $value['Titre'] ?></p>
          </td>
          <td class="text-center">
            <p class="pt-5"><?= implode('/', $value['Date']) ?></p>
          </td>
          <td class="text-center">
            <p class="pt-5"><?= $value['Prix'] ?></p>
          </td>
        <?php }
        }
        ?>
        </tr>
    <?php
    }
  