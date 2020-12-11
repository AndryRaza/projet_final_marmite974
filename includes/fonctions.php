<?php 
/**************************Pour afficher les cartes, réserver********************************/

$path='../data/atelier.json'; //chemin du fichier à traiter
$json= file_get_contents("data/atelier.json"); //ouvre le fichier
$atelier=json_decode($json, true);//traduire les données en php 



foreach($atelier as $key => $value){ /**/ 
?>

    <div class="card shadow m-lg-3" style="width: 20rem;">

    <div class="position-relative image-container">
      <div class=" position-absolute  top-0 start-0 font-weight-bold bg-primary"> </div>
      <div class="position-absolute bg-primary  font-weight-bold" style="bottom:0;"><?php echo $value['Places']?> </div>
      <img src="assets/dossier.png" class="card-img-top" text="Date" alt="plat">

    </div>
    <div class="d-flex">
      <h3 class="card-text"> <?php echo $value['Duree']?></h3>
      <h3 class="card-title ml-auto"><?php echo $value['Titre']?></h3>
    </div>
    <div class="card-body">

      <p class="card-text"><?php echo $value['Description']?></p>

        <div class="d-flex">
          <p class="card_text mt-2 "><?php echo $value['Prix']?></p>
           <form>
             <input class="btn btn-primary" type="submit" name="reserver" value="Réserver">
           </form>
         
        </div>
    </div>
  </div>

<?php 
}

?>



