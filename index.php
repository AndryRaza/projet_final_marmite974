<?php

session_start();
if (!isset($_SESSION['admin'])) //Par défaut on est pas connecté en mode admin
{
    $_SESSION['admin'] = false;
}

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = ''; //Par défaut aucun compte est connecté
}

if (!isset($_SESSION['mail'])) {
    $_SESSION['mail'] = '';
}
if (!isset($_SESSION['statut'])) {
    $_SESSION['statut'] = '';
}
if (!isset($_SESSION['id_user'])) {
    $_SESSION['id_user'] = '';
}

$data_file = "data/membre.json";
$json_membre = file_get_contents($data_file);
$membre = json_decode($json_membre, true);

include 'includes/fonctions.php'

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <title>Bienvenue sur l'application Marmite974</title>
</head>

<body>
    <section class="contenu">
        <nav class="navbar navbar-expand-md navbar-light d-flex justify-content-between ">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="ressources/img/logo.png" alt="logo" height="100" class="d-inline-block align-top logo">
                </a>

                <?php if (($_SESSION['user'] === '' && $_SESSION['admin'])) { //Quand on se connecte en mode admin
                ?>
                   <p class="msg text-center " style="font-size:40px;color:red; ">MODE ADMIN</p>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse mb-4 justify-content-end " id="navbarNav">

                                <ul class="navbar-nav pt-2">

                                    <li class="nav-item active">
                                        <a class="nav-link" href="index.php">Accueil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/page_admin.php">Voir la liste des membres</a>
                                    </li>
                                    <li class="nav-item mt-2">
                                        <form action="includes/connexion.php" method="POST">
                                            <input type="submit" class="btn btn-primary justify-self-end ml-3 mt-2" name="deconnexion" value="Se déconnecter">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                <?php } ?>
            </div>

            <?php if ($_SESSION['user'] === '' && !$_SESSION['admin']) { //Si personne est connecté, on affiche le formulaire de connexion
            ?>
                <form action="includes/connexion.php" method="POST" class="pt-2 " style="margin-right: 50px;" id="form_co">
                    <input class="form-control mb-2" type="text" name="mail_user" placeholder="Votre adresse email">
                    <input class="form-control mb-2" type="password" name="mdp_user" placeholder="Votre mot de passe">
                    <span style="font-size:13px;"> Pas encore inscrit ? <a href="pages/choix_utilisateur.html">S'inscrire</a></span>
                    <input type="submit" class="btn btn-primary" name="connexion" id="connexion" value="Se connecter">
                </form>
            <?php } ?>

            <?php
            if ($_SESSION['user'] !== '' & !$_SESSION['admin']) { //Le cas où on n'est pas un admin, mais un utilisateur
                foreach ($membre as $key => $value) {
                    if ($_SESSION['mail'] === $value['mail']) { //On regarde si notre mail est bien dans notre base de donnée
            ?>
                        <?php
                        if ($_SESSION['statut'] == "cuisinier") { //Si le statut est celui d'un cuisinier
                        ?>
                            <p class="msg text-center" style="font-size:20px; ">Bonjour <?= $_SESSION['user'] ?></p>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse mb-4 justify-content-end " id="navbarNav">

                                <ul class="navbar-nav pt-2">

                                    <li class="nav-item active">
                                        <a class="nav-link" href="index.php">Accueil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/page_atelier_cuisinier.php">Voir ses ateliers créés</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/formulaire_ajout.php">Ajouter un atelier</a>
                                    </li>
                                    <li class="nav-item mt-2">
                                        <form action="includes/connexion.php" method="POST">
                                            <input type="submit" class="btn btn-primary justify-self-end ml-3 mt-2" name="deconnexion" value="Se déconnecter">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        <?php
                        } ?>
                        <?php
                        if ($_SESSION['statut'] == 'particulier') { //Sinon le statut est un particulier et on affiche
                        ?>
                            <p class="msg text-center" style="font-size:20px;">Bonjour <?= $_SESSION['user'] ?></p>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse  justify-content-end mb-3" id="navbarNav">
                                <ul class="navbar-nav">

                                    <li class="nav-item active">
                                        <a class="nav-link" href="index.php">Accueil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/page_atelier_particulier.php">Voir mes réservations</a>
                                    </li>
                                    <li class="nav-item">
                                        <form action="includes/connexion.php" method="POST">
                                            <input type="submit" class="btn btn-primary justify-self-end ml-3 mt-3" name="deconnexion" value="Se déconnecter">
                                        </form>
                                    </li>
                                </ul>
                            </div>
            <?php
                        }
                    }
                }
            }
            ?>
        </nav>

        <header class="container-fluid py-5">
            <div class="d-flex flex-column">
                <h1 class="text-center animate__animated animate__bounce">Marmite974</h1>
                <!--Animation JS avec animate css -->
                <h2 class="text-center animate__animated animate__backInUp">Application de réservation de cours de cuisine</h2>
                <!--Animation JS avec animate css -->
            </div>
        </header>

        <section class="container-fluid ">
            <div class="container">
                <div class=" row row-cols-md-3 row-cols-1">
                    <?php
                    affichage_atelier();
                    ?>
                </div>
            </div>
        </section>
    </section>

    <!--- Footer -->
    <footer class="page-footer footer font-small  container-fluid" style="background-color: #F3671F; position:relative; bottom:0; left:0; font-size:13px;">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-2 mt-3">

                    <!-- Content -->
                    <h5 class="text-uppercase">Marmite974</h5>
                    <p>Nous sommes un centre de formation de cuisine qui propose des ateliers à nos élèves à partir de 12 ans, mais aussi à des particuliers. Les cours proposés aux particuliers permettent de financer l’achat de matériels et de matières premières.</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mt-md-2 mt-0  mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Coordonnées</h5>

                    <ul class="list-unstyled">
                        <li>
                            <p><strong>Adresse</strong> : 21 Rue des Vavangues <br> Sainte Clotilde 97490 <br> La Réunion</p>
                        </li>
                        <li>
                            <span><strong>Tel </strong>: 0262 01 02 03</span>
                        </li>
                        <li>
                            <span><strong class="">Mail </strong>: simplon974@mail.com</span>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0  mt-md-2 mt-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Réseaux sociaux</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="font-link"><i class="fab fa-facebook"> Facebook</i></a>
                        </li>
                        <li class="mt-1">
                            <a href="#!" class="font-link"><i class="fab fa-twitter"> Twitter</i></a>
                        </li>
                        <li class="mt-1">
                            <a href="#!" class="font-link"><i class="fab fa-instagram"> Instagram</i></a>
                        </li>
                        <li class="mt-1">
                            <a href="#!" class="font-link"><i class="fab fa-linkedin-in"> Linkedin</i></a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

    </footer>


    <!-- Footer -->
</body>