<?php 

session_start();
if (!isset($_SESSION['admin'])) //Par défaut on est pas connecté en mode admin
{
    $_SESSION['admin'] = false;
}

if (!isset($_SESSION['user']))
{
    $_SESSION['user'] = ''; //Par défaut aucun compte est connecté
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>  
    
    <header class="container-fluid d-flex py-5">
        <div class="d-flex flex-column">
        <h1 class="text-center">Marmite974</h1>
        <h2 class="text-center">Application de réservation de cours de cuisine</h2>
        </div>

        <?php if  ($_SESSION['user'] === '' && !$_SESSION['admin']) { //Si personne est connecté, on affiche le formulaire de connexion?>   
        <form action="includes/connexion.php" method="POST">
            <input class="form-control mb-2" type="text" name="mail_user" placeholder="Votre adresse email">
            <input class="form-control mb-2" type="password" name="mdp_user" placeholder="Votre mot de passe">
            Pas encore inscrit ? <a href="pages/choix_utilisateur.html">S'inscrire</a>
            <input type="submit" class="btn btn-primary" name="connexion" value="Se connecter">
        </form>
        <?php } ?>
    </header>
 
    <section class = "container-fluid ">
       <div class = " row row-cols-md-4 row-cols-1">
          <?php include 'includes/fonctions.php' ?>
       </div>
    </section>
</body>
