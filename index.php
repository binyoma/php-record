<?php
include('commun/header.php');
$title="Bienvenue au Velvet";
include('commun/functions.php');
$disques=record();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10">
            <h1> Liste de disques (<?= count($disques)?>)</h1>
        </div>
        <div class="col-sm-1">
            <a class="btn btn-primary " href="add/add_form.php" role="button">Ajout</a>
        </div>
    </div>
    <div class="row ">
        <?php foreach ($disques as $data): ?>
            <div class="col-sm-6 mt-2">
                <div class="row">
                    <div class="col-sm">
                        <img src="pictures/<?= $data->disc_picture ?>"  class="img-fluid " alt="<?= $data->disc_name ?>">
                    </div>
                    <div class="col-sm">
                        <ul class="list-unstyled">
                            <li><?= $data->disc_title ?></li>
                            <li><?= $data->artist_name ?></li>
                            <li>lABEL:<?= $data->disc_label ?></li>
                            <li>Year:<?= $data->disc_year ?></li>
                            <li>Genre <?= $data->disc_genre?></li>
                            <li><a href="details.php?disc_id=<?= $data->disc_id?>" class="btn btn-primary" >Détails</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>


</div>
<?php include('commun/footer.php'); ?>