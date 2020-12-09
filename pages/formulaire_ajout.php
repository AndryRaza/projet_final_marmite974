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
            <!-- Formulaire à insérer ici-->
            <form action="" method="POST">

                <!-- Titre -->
                <div class="form-group row row-cols-md-2 row-cols-1 mt-5">
                    <label class="col-md-3" for="nom_particulier">Titre :</label>
                    <input class="form-control col-md-9" type="text" name="nom_particulier" id="nom_particulier">
                </div>

                <!-- Description -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="prenom_particulier">Description :</label>
                    <input class="form-control col-md-9" type="text" name="prenom_particulier" id="prenom_particulier">
                </div>

                 <!-- Image -->
                 <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="form-label col-md-3" for="formFileSm"></label>
                    <input class="form-control form-control-sm col-md-9" type="file" id="formFileSm">
                </div>

                <!-- Date -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="phone_particulier">Date :</label>
                    <input class="form-control col-md-9" type="number" name="phone_particulier" id="phone_particulier">
                </div>

                <!-- Début (horaire) -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="mail_particulier">Début (horaire) :</label>
                    <input class="form-control col-md-9" type="email" name="mail_particulier" id="mail_particulier">
                </div>

                <!-- Durée -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="mail_particulier">Durée :</label>
                    <input class="form-control col-md-9" type="email" name="mail_particulier" id="mail_particulier">
                </div>

                <!-- Places disponible -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="mail_particulier">Places disponible :</label>
                    <input class="form-control col-md-9" type="email" name="mail_particulier" id="mail_particulier">
                </div>

                <!-- Prix -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="mail_particulier">Prix :</label>
                    <input class="form-control col-md-9" type="email" name="mail_particulier" id="mail_particulier">
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
