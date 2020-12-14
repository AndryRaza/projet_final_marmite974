<?php
session_start();
include '../includes/fonctions.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../css/style.css">
    <title>Page d'administration</title>
</head>

<nav class="navbar navbar-expand-md navbar-light ">
        <a class="navbar-brand " href="index.php">
            <img src="../ressources/img/logo.png" alt="" height="100" class="d-inline-block align-top">
        </a>
        <div class="d-flex flex-column ml-auto">
                <div class="collapse navbar-collapse mb-4 justify-content-end " id="navbarNav">
                    <ul class="navbar-nav">

                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php">Accueil</a>
                        </li>
                      
                        <li class="nav-item">
                            <form action="../includes/connexion.php" method="POST">
                                <input type="submit" class="btn btn-primary justify-self-end ml-3" name="deconnexion" value="Se déconnecter">
                            </form>
                        </li>
                    </ul>
                </div>
                
            </div>
</nav>
<section class="container">
<table class="table table-responsive-md">
    <thead>
        <tr>
            <th class="text-center" scope="col">Nom</th>
            <th class="text-center" scope="col">Date</th>
            <th class="text-center" scope="col">Prix</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <?php affichage_atelier_particulier();  ?>
</table>

</section>