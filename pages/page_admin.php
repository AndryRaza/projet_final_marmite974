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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../css/style.css">
    <title>Page d'administration</title>
</head>

<body>

    <?php if ($_SESSION['admin']) { ?>
        <nav class="navbar navbar-expand-md navbar-light ">
            <div class="container">
                <a class="navbar-brand " href="../index.php">
                    <img src="../ressources/img/logo.png" alt="" height="100" class="d-inline-block align-top logo">
                </a>

                 <p class="msg text-center " style="font-size:40px;color:red; ">MODE ADMIN</p>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse mb-4 justify-content-end " id="navbarNav">

                        <ul class="navbar-nav pt-2">

                            <li class="nav-item active">
                                <a class="nav-link" href="../index.php">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="page_admin.php">Voir la liste des membres</a>
                            </li>
                            <li class="nav-item mt-2">
                                <form action="../includes/connexion.php" method="POST">
                                    <input type="submit" class="btn btn-primary justify-self-end ml-3 mt-2" name="deconnexion" value="Se déconnecter">
                                </form>
                            </li>
                        </ul>
                    </div>

            </div>
            </div>
        </nav>
        <section class="contenu">


            <table class="table table-responsive-md">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Nom</th>
                        <th class="text-center" scope="col">Statut</th>
                        <th class="text-center" scope="col">Mail</th>
                        <th class="text-center" scope="col">Spécialité/Téléphone</th>
                    </tr>
                </thead>
                <?php affichage_membre();  ?>
            </table>
        </section>
    <?php } else {
        header('Location: ../index.php');
    }
    ?>
    <!-- Footer -->
    <?php include '../includes/footer.php' ?>

</body>