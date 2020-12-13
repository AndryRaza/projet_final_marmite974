<?php

/**************************Pour afficher les cartes, réserver********************************/

$path = '../data/atelier.json'; //chemin du fichier à traiter
$json = file_get_contents("data/atelier.json"); //ouvre le fichier
$atelier = json_decode($json, true); //traduire les données en php 



foreach ($atelier as $key => $value) { /* read array  */
?>

  <div class="card shadow m-lg-3" style="width: 20rem;">

    <div class="position-relative image-container">
      <div class=" position-absolute  top-0 start-0 font-weight-bold bg-primary"><?php echo /*affiche la date */ implode('/', $value['Date']) ?> </div>
      <div class="position-absolute bg-primary  font-weight-bold" style="bottom:0;">
        <?php if ($value['Places'] > 0) {
          echo $value['Places'] . ' place(s) restante(s)';
        } else {
          echo 'Complet';
        }  ?>
      </div>
      <img src="ressources\charte\plat2.jpg" class="card-img-top" text="Date" alt="plat">

    </div>
    <div>
      <p class="card-text"> Durée : <?php echo $value['Duree'] ?> jours</p>
      <h4 class="card-title ml-auto"><?php echo $value['Titre'] ?></h4>
    </div>
    <div class="card-body">

      <p class="card-text"><?php echo $value['Description'] ?></p>

      <div class="d-flex justify-content-between">
        <p class="card_text mt-2 ml-auto "><?php echo $value['Prix'] ?></p>
        <form action="includes/reserve.php" method="POST">
          <input type="hidden" value="<?php echo $value['Id'] ?>" name="id">
          <?php
          if ($value['Places'] > 0) {
          ?>
            <input class="btn btn-primary d-flex justify-content-right  ml-auto" type="submit" name="reserver" value="Réserver">
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

<?php
}
?>