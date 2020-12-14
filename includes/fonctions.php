<?php

/**************************Pour afficher les cartes, réserver********************************/

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

function correction_date($jour,$mois,$year){  //On corrige si la date est incorrecte

  if ($jour > 30 && $mois === 'Fevrier' && $year%4 === 0){  //Année bissextile 
    return array(29, $mois, $year);
  }

  if ($jour > 29 && $mois === 'Fevrier' && $year%4 != 0){  //Année non bissextile
    return array(28, $mois, $year);
  }

  if ($jour > 31 && ($mois==='Avril' || $mois ==='Juin' || $mois ==='Septembre' || $mois ==='Novembre') ) //Année où l'on a que 30 jours
  {
    return array(30, $mois, $year);
  }
}


function affichage_atelier()
{
  $path = '../data/atelier.json'; //chemin du fichier à traiter
  $json = file_get_contents("data/atelier.json"); //ouvre le fichier
  $atelier = json_decode($json, true); //traduire les données en php 
 

  if ($atelier===[])
  {
    echo '<p class="text-center w-100 animate__animated animate__backInUp" style="font-size:30px"> Rien pour le moment ! <br> Revenez plus tard ! </p>';
  }
  $reverse_atelier = array_reverse($atelier); // Pour pouvoir afficher les ateliers récemments ajoutés 
  foreach ($reverse_atelier as $key => $value) {
    $expire = false;
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
      <div class="card shadow  mb-3 mx-md-3 " style="width: 20rem;" id="card_<?= $value['Id'] ?>">

        <div class="position-relative image-container">
          <div class=" position-absolute  top-0 start-0 font-weight-bold text-white"style="font-size:20px;background-color:#d05c62">À partir du <br><?php echo /*affiche la date */ implode(' ', $value['Date']) ?> </div>
          <div class="position-absolute text-white font-weight-bold" style="bottom:0;font-size:23px;background-color:#d05c62">
            <?php if ($expire == true) {
              echo 'Expiré';
            } elseif ($value['Places'] > 0) {
              echo $value['Places'] . ' place(s) restante(s)';
            } else {
              echo 'Complet';
            }  ?>
          </div>
          <img src="<?= $value['Image'] ?>" class="card-img-top" text="Date" alt="plat" height="300px" width="200px">

        </div>
        <div>
          <p class="card-text"> Durée : <?php echo $value['Duree'] ?> h</p>
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
                <input class="btn btn-primary d-flex justify-content-right  ml-auto mt-3" type="submit" name="reserver" value="Terminé" disabled>
              <?php
              } elseif ($value['Places'] > 0) {
              ?>
                <input class="btn btn-primary d-flex justify-content-right  ml-auto mt-3" type="submit" name="reserver" value="Réserver">
              <?php
              } else {
              ?>
                <input class="btn btn-primary d-flex justify-content-right  ml-auto mt-3" type="submit" name="reserver" value="Complet" disabled>
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

      if (in_array($_SESSION['mail'],$atelier[$key]['participant'] )) {

    ?>
        <tr>
          <td class="text-center">
            <p class="pt-4"><?= $value['Titre'] ?></p>
          </td>
          <td class="text-center">
            <p class="pt-4"><?= implode('/', $value['Date']) ?> à <?php implode(':',$value['DebutHoraire']) ?></p>
          </td>
          <td class="text-center">
            <p class="pt-4"><?= $value['Prix'] ?></p>
          </td>
          <td class="text-center">
            <?php if (!$expire){ ?>
            <form action="../includes/annulation.php" method="POST">
              <input type="hidden" value="<?= $atelier[$key]['Id'];?>" name="id_atelier"> 
              <input type="hidden" value="<?= $_SESSION['mail']?>" name="user">
              <input type="submit" class="btn btn-primary mt-4" name="annuler" id="annuler" value="Annuler">
            </form>
            <?php } ?>
          </td>
        <?php }
        }
        ?>
        </tr>
    <?php
    }
  