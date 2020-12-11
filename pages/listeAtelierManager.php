<?php 
$data_file = "../data/atelier.json";
$json = file_get_contents("../data/atelier.json"); 
$atelier = json_decode($json, true);

foreach (array_reverse($atelier)as $key => $value) :?> 
<thead>
        <tr>
                <td class="align-middle text-center" scope="col"><?=$value['Titre'] ?></td>
                <td class="align-middle text-center" scope="col"><?=$value['Description']?></td>
                <td class="align-middle text-center" scope="col">
                    <form method="POST" enctype="multipart/form-data" action="#<?= $value['id']?> ">
                        <input name="indice" value="<?= $value['id'] ?>" style="display: none;">
                        <input class="btn-sm btn-primary mb-2" type="submit" value="Activer" name="submit_activer">
                        <input class="btn-sm btn-primary mb-2" type="submit" value="Désactiver" name="submit_desactiver">
                    </form>
                    <form method="POST" enctype="multipart/form-data" action="modificateurenchere.php?id=<?=$value['id']?>">
                        <input class="btn-sm btn-primary" type="submit" value="Modifier" name="" >
                    </form>
                </td> 
                 
        </tr>
   
</thead>
<?php endforeach ?>