<?php
session_start();
if (empty($_SESSION['reussite']) && empty($_SESSION['erreur'])) {
    $_SESSION['reussite'] = false;
    $_SESSION['erreur'] = false;
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

    <title>Page d'inscription : Particulier</title>
</head>

<body>

    <!-- Header / Nav-->
    <nav class="navbar navbar-expand-md navbar-light ">
        <a class="navbar-brand " href="../index.php">
            <img src="../ressources/img/logo.png" alt="" height="100" class="d-inline-block align-top">
        </a>
        <div class="d-flex flex-column ml-auto">
                <div class="collapse navbar-collapse mb-4 justify-content-end " id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php">Accueil</a>
                        </li>
                    </ul>
                </div>
                
            </div>
</nav>

    <?php
    if ($_SESSION['reussite'] == true) {
        echo '<div class="text-center font-weight-bold"> <span class="text-success">Votre inscription a été validée</span> </div>';
    }
    $_SESSION['reussite'] = false;

    if ($_SESSION['erreur'] == true) {
        echo '<div class="text-center font-weight-bold"> <span class="text-danger">Erreur lors de l\'inscription</span> </div>';
    }
    $_SESSION['erreur'] = false;
    ?>


    <!-- Debut formulaire -->
    <section class="container-fluid">
        <div class="container mt-2">
            <!-- Formulaire à insérer ici-->
            <form action="../includes/inscription_particulier.php" method="POST">

                <!-- Nom -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="nom_particulier">* Nom :</label>
                    <input class="form-control col-md-9" type="text" name="nom_particulier" id="nom_particulier" required autocomplete pattern="[a-zA-Z\s]{3,32}" minlength="2" placeholder="Smith">
                </div>

                <!-- Prenom -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="prenom_particulier">* Prénom :</label>
                    <input class="form-control col-md-9" type="text" name="prenom_particulier" id="prenom_particulier" required autocomplete minlength="2" pattern="[a-zA-Z-\s]{3,32}" placeholder="John">
                </div>

                <!-- Telephone -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="phone_particulier">Téléphone :</label>
                    <input class="form-control col-md-9" type="tel" name="phone_particulier" id="phone_particulier" autocomplete placeholder="123456" pattern="[0-9]{6}">
                </div>

                <!-- Mail -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="mail_particulier">* Adresse email :</label>
                    <input class="form-control col-md-9" type="email" name="mail_particulier" id="mail_particulier" required autocomplete placeholder="jhonsmith@mail.com" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?">
                </div>

                <!-- Mot de passe -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="mail_particulier">* Mot de passe :</label>
                    <input class="form-control col-md-9" type="password" name="password_particulier" id="password_particulier" onkeyup="check();" required pattern="[^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$]">
                </div>

                <!-- Confirmation mot de passe -->
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="mail_particulier">* Confirmez votre mot de passe :</label>
                    <input class="form-control col-md-9" type="password" name="confirm_particulier" id="confirm_particulier" onkeyup="check();" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
                    <span id="message" class="mx-auto"></span>
                </div>

                <!-- Bouton -->
                <div class="form-group d-flex justify-content-between">
                    <input type="hidden" name="statut_particulier" value="particulier">
                    <input type="hidden" name="atelier_cuisinier" value="atelier_cuisinier">
                    <label for="inscription_particulier">* : Champ obligatoire</label>
                    <input class="btn-lg btn-info" type="submit" name="inscription_particulier" value="S'inscrire">
                </div>
            </form>
        </div>
    </section>
</body>

<script>
    var check = function() {
        if (document.getElementById('password_particulier').value != '') {
            if (document.getElementById('password_particulier').value == document.getElementById('confirm_particulier').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Mot de passe confirmé';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Mot de passe incorrect';
            }
        }
    }
</script>

</html>