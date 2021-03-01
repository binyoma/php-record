<?php
include('commun/header.php');
$title="Détails";
?>

    <div class="container-fluid">
        <h1>Détails  </h1>
        <?php
        include('commun/functions.php');
        $disc=details();
        ?>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="title"> Title</label>
                <input class="form-control" type="text" placeholder="<?= $disc->disc_title ?>"  disabled>

            </div>
            <div class="col-sm-6 form-group">
                <label for="artist"> Artist</label>
                <input class="form-control" type="text" placeholder="<?= $disc->artist_name ?>"  disabled>
            </div>
            <div class="col-sm-6 form-group">
                <label for="year"> Year</label>
                <input class="form-control" type="text" placeholder=" <?= $disc->disc_year ?>"  disabled>
            </div>
            <div class="col-sm-6 form-group">
                <label for="genre"> Genre</label>
                <input class="form-control" type="text" placeholder=" <?= $disc->disc_genre ?>"  disabled>
            </div>
            <div class="col-sm-6 form-group">
                <label for="label"> Label</label>
                <input class="form-control" type="text" placeholder=" <?= $disc->disc_label ?>"  disabled>
            </div>
            <div class="col-sm-6 form-group">
                <label for="price"> Price</label>
                <input class="form-control" type="text" placeholder="<?= $disc->disc_price ?>"  disabled>
            </div>
            <div class="col-sm-6 form-group">
                <label for="picture"> Picture</label>
                <div >
                    <img src="pictures/<?= $disc->disc_picture ?>"  class="img-fluid " alt="<?= $disc->disc_title ?>">

                </div>
            </div>
        </div>
        <div class="row mt-2">
            <a class="btn btn-primary col-sm-1 ms-2" href="update/update_form.php?disc_id=<?=$disc->disc_id?>" role="button">Modifier</a>
            <a class="btn btn-primary col-sm-1 ms-2" href="delete/delete_form.php?disc_id=<?=$disc->disc_id?>" role="button">Supprimer</a>
            <a class="btn btn-primary col-sm-1 ms-2" href="index.php" role="button">Retour</a>
        </div>
    </div>

<?php include('commun/footer.php');