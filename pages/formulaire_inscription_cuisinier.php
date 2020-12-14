<?php
session_start();

if (!isset($_SESSION['ressusite_cuisinier']) && empty($_SESSION['erreur_cuisinier'])) {
    $_SESSION['ressusite_cuisinier'] = false;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <title>Page d'inscription : Cuisinier</title>
</head>

<body>
    <section class="container-fluid">
        <div class="container mt-2">
            <!-- Formulaire à insérer ici-->

            <h1> Formulaire inscription : Cuisinier.</h1>

            <?php
            if ($_SESSION['reussite_cuisinier'] == true) {
                echo '<div class="text-center font-weight-bold"> <span class="text-success">Votre inscription a été validée</span> </div>';
            }
            $_SESSION['reussite_cuisinier'] = false;

            if ($_SESSION['erreur_cuisinier'] == true) {
                echo '<div class="text-center font-weight-bold"> <span class="text-danger">Erreur lors de l\'inscription</span> </div>';
            }
            $_SESSION['erreur_cuisinier'] = false;
            ?>

            <section class="container_fluid">
                <div>

                    <form action="../includes/inscription_cuisinier.php" method="POST">
                        <!--nom du cuisinier-->
                        <div class="form-group row row-cols-md-2 row-cols-1">

                            <label for="nom-du-cuisinier" class="col-md-3"> * Nom</label>
                            <input type="text" class="form-control col-md-9" name="nom_du_cuisinier" required placeholder=" DUPOND " pattern="[A-Z][A-Za-z' -]+">

                        </div>


                        <!--prenom du cuisinier-->
                        <div class="form-group row row-cols-md-2 row-cols-1">

                            <label for="prenom-du-cuisinier" class="col-md-3"> * Prénom </label>
                            <input type="text" class="form-control col-md-9" name="prenom_du_cuisinier" required placeholder=" Bernard" pattern="[A-Z][A-Za-z'- ]+">

                        </div>

                        <!--l'e-mail du cuisinier-->
                        <div class="form-group row row-cols-md-2 row-cols-1">

                            <label for="email-du-cuisinier" class="col-md-3"> * Email</label>
                            <input type="email" id="email" class=" form-control col-md-9" name="email_du_cuisinier" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">

                        </div>

                        <!--La spécialité du cuisinier-->
                        <div class="form-group row row-cols-md-2 row-cols-1">

                            <label for="spécialtite-du-cuisinier" class="col-md-3"> Spécialité </label>
                            <input type="text" class=" form-control col-md-9" name="specialite_du_cuisinier" pattern="[a-zA-Z @ & é è' $ # µ ç §]+">

                        </div>

                        <!-- Mot de passe -->
                        <div class="form-group row row-cols-md-2 row-cols-1">
                            <label class="col-md-3" for="mail_particulier">* Mot de passe :</label>
                            <input class="form-control col-md-9" type="password" name="password_particulier" id="password_particulier" onkeyup="check();" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
                        </div>

                        <!-- Confirmation mot de passe -->
                        <div class="form-group row row-cols-md-2 row-cols-1">
                            <label class="col-md-3" for="mail_particulier">* Confirmez votre mot de passe :</label>
                            <input class="form-control col-md-9" type="password" name="confirm_particulier" id="confirm_particulier" onkeyup="check();" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
                            <span id="message" class="mx-auto"></span>
                        </div>


                        <div class="form-group d-flex justify-content-between">
                            <input type="hidden" name="statut_cuisinier" value="cuisinier">
                            <input type="hidden" name="atelier_cuisinier" value="atelier_cuisinier">
                            <label for="inscription_particulier">* : Champ obligatoire</label>
                            <input class="btn-lg btn-info" type="submit" name="inscription_cuisinier" value="S'inscrire">
                        </div>


                    </form>

                </div>
            </section>

        </div>
    </section>
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
</body>