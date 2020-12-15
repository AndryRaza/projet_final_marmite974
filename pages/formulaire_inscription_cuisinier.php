<?php
session_start();

if (!isset($_SESSION['reussite_cuisinier'])) {
    $_SESSION['reussite_cuisinier'] = false;
}

if (!isset($_SESSION['erreur_cuisinier'])) {
    $_SESSION['erreur_cuisinier'] = false;
}

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
    <link rel="stylesheet" href="../css/style.css">

    <title>Page d'inscription : Cuisinier</title>
</head>

<body>
    <!-- Header / Nav-->
    <header>
        <nav class="container-fluid navbar mb-5">
            <div class="container">
                <a href="../index.html"><img src="../ressources/img/logo.png" class="logo" alt="Logo de l'entreprise" height="100"></a>
                <h1 class="py-3">Formulaire d'inscription : Cuisinier</h1>
                <a href="../index.php"><input class="btn btn-info" type="button" value="Accueil"></a>
            </div>
        </nav>
    </header>
    <?php
    if ($_SESSION['reussite_cuisinier'] === true) {
        echo '<div class="text-center font-weight-bold"> <span class="text-success">Votre inscription a été validée</span> </div>';
    }
    $_SESSION['reussite_cuisinier'] = false;

    if ($_SESSION['erreur_cuisinier'] === true) {
        echo '<div class="text-center font-weight-bold"> <span class="text-danger">Erreur lors de l\'inscription</span> </div>';
    }
    $_SESSION['erreur_cuisinier'] = false;
    ?>

    <section class="container-fluid">
        <div class="container mt-2">

            <form action="../includes/inscription_cuisinier.php" method="POST">
                <!--nom du cuisinier-->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label for="nom-du-cuisinier" class="col-md-3"> * Nom :</label>
                    <input type="text" class="form-control col-md-9" name="nom_du_cuisinier" required placeholder=" DUPOND " pattern="[A-Z][A-Za-z' -]+">
                </div>


                <!--prenom du cuisinier-->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label for="prenom-du-cuisinier" class="col-md-3"> * Prénom :</label>
                    <input type="text" class="form-control col-md-9" name="prenom_du_cuisinier" required placeholder=" Bernard" pattern="[A-Z][A-Za-z'- ]+">
                </div>

                <!--l'e-mail du cuisinier-->
                <div class="form-group row row-cols-md-2 row-cols-1">

                    <label for="email-du-cuisinier" class="col-md-3"> * Email :</label>
                    <input type="email" id="email" class=" form-control col-md-9" name="email_du_cuisinier" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">

                </div>

                <!--La spécialité du cuisinier-->
                <div class="form-group row row-cols-md-2 row-cols-1">

                    <label for="spécialtite-du-cuisinier" class="col-md-3"> Spécialité :</label>
                    <input type="text" class=" form-control col-md-9" name="specialite_du_cuisinier" pattern="[a-zA-Z @ & é è' $ # µ ç §]+">

                </div>

                <!-- Mot de passe -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="mail_particulier">* Mot de passe :</label>
                    <input class="form-control col-md-9" type="password" name="password_cuisinier" id="password_cuisinier" onkeyup="check();" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
                </div>

                <!-- Confirmation mot de passe -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="mail_particulier">* Confirmez votre mot de passe :</label>
                    <input class="form-control col-md-9" type="password" name="confirm_cuisinier" id="confirm_cuisinier" onkeyup="check();" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
                    <span id="message" class="mx-auto"></span>
                </div>


                <div class="form-group d-flex justify-content-between">
                    <input type="hidden" name="statut_cuisinier" value="cuisinier">
                    <input type="hidden" name="atelier_cuisinier" value="atelier_cuisinier">
                    <label for="inscription_particulier">* : Champ obligatoire</label>
                    <input class="btn-lg btn-info" type="submit" name="inscription_cuisinier" value="S'inscrire">
                </div>
                <small><strong>Attention :</strong> le mot de passe doit contenir minimum 8 caractères dont une lettre en majuscule, une minuscule, un chiffre et un caractère spécial (ex : @$!%*?& ).</small>
            </form>

        </div>
    </section>

    <!-- Footer -->
    <?php include '../includes/footer.php' ?>

    <script>
        var check = function() {
            if (document.getElementById('password_cuisinier').value != '') {
                if (document.getElementById('password_cuisinier').value == document.getElementById('confirm_cuisinier').value) {
                    document.getElementById('message').style.color = 'green';
                    document.getElementById('message').innerHTML = 'Mot de passe confirmé';
                } else {
                    document.getElementById('message').style.color = 'red';
                    document.getElementById('message').innerHTML = 'Mot de passe incorrect';
                }
            }
        }
    </script>
</body>