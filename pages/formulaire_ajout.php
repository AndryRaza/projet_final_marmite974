<?php 
/**************************Formulaire pour ajouter un atelier********************************/
?>

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


    <title>Ajouter un atelier</title>
</head>
<body>
    <section class="container-fluid">
        <div class="container mt-2">

            <div class="h2 text-center">AJOUT ATELIER</div>
            <!-- Formulaire à insérer ici-->
            <form action="" method="POST">

                <!-- Titre -->
                <div class="form-group row row-cols-md-2 row-cols-1 mt-5">
                    <label class="col-md-3" for="nom_particulier">Titre :</label>
                    <input class="form-control col-md-9" type="text" name="nom_particulier" id="nom_particulier" required pattern="[A-Za-z é è ]+" placeholder='Veuillez saisir un titre'>
                </div>

                <!-- Description -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="prenom_particulier">Description :</label>
                    <input class="form-control col-md-9" type="text" name="prenom_particulier" id="prenom_particulier" required pattern="[A-Za-z é è ]+" placeholder='Veuillez saisir une description'>
                </div>

                 <!-- Image -->
                 <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="form-label col-md-3" for="formFileSm">Image :</label>
                    <input class="form-control form-control-sm col-md-9" type="file" id="formFileSm" required>
                </div>

                <!-- Date -->
                <div class="form-group row row-cols-md-4 row-cols-1">
                    <label class="col-md-3" for="Date">Date :</label>
                    <input class="form-control col-md-3" type="number" name="Day" id="Day" required pattern="[0-9]{2}" >
                    <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Mois</option>
                        <option value="1">Janvier</option>
                        <option value="2">Février</option>
                        <option value="3">Mars</option>
                        <option value="4">Avril</option>
                        <option value="5">Mai</option>
                        <option value="6">Juin</option>
                        <option value="7">Juillet</option>
                        <option value="8">Août</option>
                        <option value="9">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
                    </select>
                    </div>
                    <input class="form-control col" type="number" name="Year" id="Year" required pattern="[0-9]{4}" minlength="4" maxlength="4" >
                </div>

                <!-- Début (horaire) -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="Début(horaire)">Début (horaire) :</label>
                    <input class="form-control col-md-9" type="number" name="Début(horaire)" id="Début(horaire)" required placeholder="Veuillez choisir l'horaire de début de l'atelier">
                </div>

                <!-- Durée -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="Duree">Durée :</label>
                    <input class="form-control col-md-9" type="number" name="Duree" id="Duree" required placeholder="Veuillez entrer la durée de l'atelier">
                </div>

                <!-- Places disponible -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="Places">Places disponibles :</label>
                    <input class="form-control col-md-9" type="number" name="Places" id="Places" required placeholder="Entrer le nombre de place disponibles" pattern="[0-9]">
                </div>

                <!-- Prix -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="Prix">Prix (€) :</label>
                    <input class="form-control col-md-9" type="number" name="Prix" id="Prix" required placeholder="Veuillez entrer le prix" pattern="[0-9]">
                </div>

                <!-- Bouton -->
                <div class="form-group d-flex justify-content-end">
                    <input type="hidden" name="statut_particulier" value="particulier">
                    <input type="hidden" name="atelier_cuisinier" value="atelier_cuisinier">
                    <input class="btn btn-info" type="submit" name="inscription_particulier" value="Ajouter">
                </div>
            </form>
        </div>
    </section>
</body>
