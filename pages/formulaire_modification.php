<!-- Fonction qui permet de modifier les informations -->
<?php if (isset($_POST['submit_parametre'])) : ?>
    <!---->
    <?php
    $data_file = "../data/atelier.json";
    $json = file_get_contents("../data/atelier.json");
    $atelier = json_decode($json, true);

    $id = $_GET['id'];
    foreach ($atelier as $key => $value) {
        if ($value['Id'] == $id) {
            $atelier[$key]['Titre'] =  $_POST['titre'];
            $atelier[$key]['Description'] =  $_POST['Description'];
            $atelier[$key]['Date'][0] = $_POST['Day'];
            $atelier[$key]['Date'][1] = $_POST['Mois'];
            $atelier[$key]['Date'][2] = $_POST['Year'];
            $atelier[$key]['Duree'] =  $_POST['Duree'];
            $atelier[$key]['Places'] =  $_POST['Places'];
            $atelier[$key]['Prix'] =  $_POST['Prix'];
            file_put_contents($data_file, json_encode($atelier));
        }
    }
    header('Location: ./page_atelier_cuisinier.php');

    ?>
<?php endif ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Page de modification</title>
</head>


<!-- Header / Nav-->
<header>
    <nav class="navbar container-fluid mb-5">
        <a href="../index.html"><img src="../ressources/img/logo.png" alt="Logo" class="logo" height="180"></a>
        <h1 class="py-3 text-center">Formulaire d'ajout d'atelier</h1>
        <div>
            <a href="../index.php">
                <input class="btn btn-info" type="button" value="Accueil"></a>
            <a href="formulaire_ajout.php">
                <input class="btn btn-info" type="button" value="Ajouter un atelier"></a>
        </div>

    </nav>
</header>


<body>
    <section class="contenu">
        <section class="container-fluid">
            <div class="container mt-2">
                <div class="h2 text-center">MODIFIER ATELIER</div>
                <!-- Récupere les données dans le fichier JSON -->
                <?php
                $data_file = "../data/atelier.json";
                $json = file_get_contents("../data/atelier.json");
                $atelier = json_decode($json, true); ?>

                <!-- Lance une boucle foreach pour pouvoir récuperer l'ID de l'enchere a modifier -->
                <?php foreach ($atelier as $key => $value) : ?>
                    <?php if ($value['Id'] == $_GET['id']) : ?>
                        <!-- Titre -->
                        <form class="" method="POST" enctype="multipart/form-data" action="">
                            <div class="form-group row row-cols-md-2 row-cols-1 mt-5">
                                <label class="col-md-3" for="titre">Titre :</label>
                                <input class="form-control col-md-9" type="text" name="titre" id="titre" maxlength="40" required pattern="[A-Za-z é è ]+" placeholder='Veuillez saisir un titre' value='<?= $value['Titre'] ?>'>
                            </div>

                            <!-- Description -->
                            <div class="form-group row row-cols-md-2 row-cols-1">
                                <label class="col-md-3" for="Description">Description :</label>
                                <input class="form-control col-md-9" type="text" name="Description" id="Descrption" maxlength="60" required pattern="[A-Za-z é è ]+" placeholder='Veuillez saisir une description' value='<?= $value['Description'] ?>'>
                            </div>

                            <!-- Image -->
                            <div class="form-group row row-cols-md-2 row-cols-1">
                                <label class="form-label col-md-3" for="formFileSm">Image :</label>
                                <input class="form-control form-control-sm col-md-9" type="file" id="formFileSm" name="formFileSm">
                            </div>

                            <!-- Date -->
                            <div class="form-group row row-cols-md-4 row-cols-1">
                                <label class="col-md-3" for="Date">Date :</label>
                                <input class="form-control col-md-3" type="number" name="Day" id="Day" required min="1" max="31" onKeyPress="if(this.value.length==2) return false;" value='<?= $value['Date'][0] ?>'>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name='Mois'>
                                        <option selected='<?= $value['Date'][1] ?>'><?= $value['Date'][1] ?></option>
                                        <option value="Janvier">Janvier</option>
                                        <option value="Fevrier">Février</option>
                                        <option value="Mars">Mars</option>
                                        <option value="Avril">Avril</option>
                                        <option value="Mai">Mai</option>
                                        <option value="Juin">Juin</option>
                                        <option value="Juillet">Juillet</option>
                                        <option value="Aout">Août</option>
                                        <option value="Septembre">Septembre</option>
                                        <option value="Octobre">Octobre</option>
                                        <option value="Novembre">Novembre</option>
                                        <option value="Decembre">Décembre</option>
                                    </select>
                                </div>
                                <input class="form-control col" type="number" name="Year" id="Year" required min="2020" max="2050" onKeyPress="if(this.value.length==4) return false;" value='<?= $value['Date'][2] ?>'>
                            </div>

                            <!-- Début (horaire) -->
                            <div class="form-group row row-cols-md-3 row-cols-1">
                                <label class="col-md-3" for="debut_horaire">Début (horaire) :</label>
                                <input class="form-control col-md-4 mr-2" type="number" name="debut_horaireH" id="debut_horaire" required placeholder="Heures" min="1" max="24" onKeyPress="if(this.value.length==2) return false;" value='<?= $value['DebutHoraire'][0] ?>'>
                                <input class="form-control col-md-4" type="number" name="debut_horaireM" id="debut_horaire" required placeholder="Minutes" min="1" max="60" onKeyPress="if(this.value.length==2) return false;" value='<?= $value['DebutHoraire'][1] ?>'>
                            </div>

                            <!-- Durée -->
                            <div class="form-group row row-cols-md-2 row-cols-1">
                                <label class="col-md-3" for="Duree">Durée :</label>
                                <input class="form-control col-md-9" type="number" name="Duree" id="Duree" required placeholder="Veuillez entrer la durée de l'atelier" min="1" value='<?= $value['Duree'] ?>'>
                            </div>

                            <!-- Places disponible -->
                            <div class="form-group row row-cols-md-2 row-cols-1">
                                <label class="col-md-3" for="Places">Places disponibles :</label>
                                <input class="form-control col-md-9" type="number" name="Places" id="Places" required placeholder="Entrer le nombre de place disponibles" pattern="[0-9]+" min="1" value='<?= $value['Places'] ?>'>
                            </div>

                            <!-- Prix -->
                            <div class="form-group row row-cols-md-2 row-cols-1">
                                <label class="col-md-3" for="Prix">Prix (€) :</label>
                                <input class="form-control col-md-9" type="number" name="Prix" id="Prix" required placeholder="Veuillez entrer le prix" pattern="[0-9]+" min="1" value='<?= $value['Prix'] ?>'>
                            </div>

                            <!-- Bouton -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" name="submit_parametre" class="btn btn-warning text-uppercase text-white font-weight-bold btn AjoutEnchere mb-5" style="width:220px; height:80px;">Enregistrer modification</button>
                            </div>
                        </form>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </section>
    </section>
</body>


<!-- Footer -->
<?php include '../includes/footer.php' ?>