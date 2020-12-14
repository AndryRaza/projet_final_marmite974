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


$data_file = "data/membre.json";
$json_membre = file_get_contents($data_file);
$membre = json_decode($json_membre, true);

include 'includes/fonctions.php'

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>Bienvenue sur l'application Marmite974</title>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light ">
        <a class="navbar-brand " href="index.php">
            <img src="ressources/img/logo.png" alt="" height="100" class="d-inline-block align-top">
        </a>
        <?php if (($_SESSION['user'] === '' && $_SESSION['admin'])) { //Quand on se connecte en mode admin
        ?>
            <div class="d-flex flex-column ml-auto">
                <p class="text-center" style="font-size:30px;">Mode Admin </p>
                <div class="collapse navbar-collapse mb-4 justify-content-end " id="navbarNav">
                    <ul class="navbar-nav">

                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/page_admin.php">Voir les membres</a>
                        </li>

                        <li class="nav-item">
                            <form action="includes/connexion.php" method="POST">
                                <input type="submit" class="btn btn-primary justify-self-end ml-3" name="deconnexion" value="Se déconnecter">
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
        <?php } ?>

        <?php if ($_SESSION['user'] === '' && !$_SESSION['admin']) { //Si personne est connecté, on affiche le formulaire de connexion
        ?>
            <form action="includes/connexion.php" method="POST">
                <input class="form-control mb-2" type="text" name="mail_user" placeholder="Votre adresse email">
                <input class="form-control mb-2" type="password" name="mdp_user" placeholder="Votre mot de passe">
                Pas encore inscrit ? <a href="pages/choix_utilisateur.html">S'inscrire</a>
                <input type="submit" class="btn btn-primary" name="connexion" value="Se connecter">
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
                        <div class="collapse navbar-collapse mb-4 justify-content-end " id="navbarNav">
                            <ul class="navbar-nav">

                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/listeAtelierManager.php">Voir ses ateliers créés</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/formulaire_ajout.php">Ajouter un atelier</a>
                                </li>
                                <li class="nav-item">
                                    <form action="includes/connexion.php" method="POST">
                                        <input type="submit" class="btn btn-primary justify-self-end ml-3" name="deconnexion" value="Se déconnecter">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    <?php
                    } ?>
                    <?php
                    if ($_SESSION['statut'] == 'particulier') { //Sinon le statut est un particulier et on affiche
                    ?>
                        <div class="collapse navbar-collapse mb-4 justify-content-end " id="navbarNav">
                            <ul class="navbar-nav">

                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/page_reservation_particulier.php">Voir mes réservations</a>
                                </li>
                                <li class="nav-item">
                                    <form action="includes/connexion.php" method="POST">
                                        <input type="submit" class="btn btn-primary justify-self-end ml-3" name="deconnexion" value="Se déconnecter">
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
            <div class=" row row-cols-md-4 row-cols-1">
                <?php
                affichage_atelier();
                ?>
            </div>
        </div>
    </section>
</body>