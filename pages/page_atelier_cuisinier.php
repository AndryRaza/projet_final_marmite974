<?php session_start(); ?>

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

    <!-- Header / Nav-->
    <header class="container-fluid  mb-5" style="background-color: #f3671f">
        <nav class="navbar container">
            <a href="../index.html"><img src="../ressources/img/logo.png" class="logo" alt="Logo de l'entreprise" height="100"></a>
            <h1 class="py-3">Liste des ateliers</h1>
            <div>
                <a href="../index.php">
                    <input class="btn btn-primary" type="button" value="Accueil"></a>
                <a href="formulaire_ajout.php">
                    <input class="btn btn-primary" type="button" value="Ajouter un atelier"></a>
            </div>

        </nav>
    </header>
</head>
<title>Ajouter un atelier</title>
</head>

<body>
<?php if ($_SESSION['user'] !== '' && $_SESSION['statut'] === 'cuisinier') { ?>
<section class="contenu">
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="align-middle text-center" scope="col">Nom</th>
                        <th class="align-middle text-center" scope="col">Description</th>
                        <th class="align-midlle text-center" scope="col">Etat</th>
                        <th class="align-middle text-center" scope="col">Modifier</th>
                    </tr>
                </thead>
                <?php include '../pages/listeAtelierManager.php'; ?>
            </table>
        </div>
    </div>
</section>
<?php include '../includes/footer.php' ?>
<?php } else {header('Location: ../index.php');} ?>
</body>