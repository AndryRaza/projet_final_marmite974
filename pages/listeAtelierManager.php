

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>


    <title>Liste des ateliers</title>

<body>
    <div class="container-fluid">

        <?php
        require_once "../includes/modification.php";
        $data_file = "../data/atelier.json";
        $json = file_get_contents("../data/atelier.json");
        $atelier = json_decode($json, true);

        foreach ($atelier as $key => $value) {
            if ($_SESSION['mail'] == $value['createur']) {
        ?>
                <thead>
                    <tr>
                        <td class="align-middle text-center" scope="col"><?= $value['Titre'] ?></td>
                        <td class="align-middle text-center" scope="col"><?= $value['Description'] ?></td>
                        <td class="align-middle text-center" scope="col"> <?= $value['etat'] ?> </td>
                        <td class="align-middle text-center" scope="col">
                            <form method="POST" enctype="multipart/form-data" action="#<?= $value['Id'] ?> ">
                                <input name="indice" value="<?= $value['Id'] ?>" type="hidden">
                                <input class="btn-sm btn-primary mb-2" type="submit" value="Activer" name="submit_activer">
                                <input class="btn-sm btn-primary mb-2" type="submit" value="Désactiver" name="submit_desactiver">
                            </form>
                            <form method="POST" enctype="multipart/form-data" action="formulaire_modification.php?id=<?= $value['Id'] ?>">
                                <input class="btn-sm btn-primary" type="submit" value="Modifier" name="">
                            </form>
                        </td>

                    </tr>

                </thead>
        <?php
            }
        } ?>

    </div>
</body>