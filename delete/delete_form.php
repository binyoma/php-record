<?php
$title = "supprimer un vinyle";
include('../commun/header.php');
include ('../commun/functions.php');
include('delete_script.php');
$disc = details();

if (isset($_POST['submit'])){
    ?>
    <div class="offset-3 mt-5">
        <p>le disque a été supprimé</p>
        <a class="btn btn-primary col-sm-1 ms-2" href="../index.php" role="button">Retour</a>
    </div>
<?php } else {
    ?>
    <div class="container-fluid">
    <h3 class="text-danger">Voulez-vous vraiment supprimer ce disque?</h3>
        <?php var_dump($disc);?>
    <form action="#" method="post" enctype="multipart/form-data">
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
                <img src="../pictures/<?= $disc->disc_picture ?>"  class="img-fluid " alt="<?= $disc->disc_title ?>">

            </div>
        </div>
    </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?= $disc->disc_id ?>">
            <input type="submit" name="submit" value="Supprimer" id="submit" class="btn btn-primary col-1 mt-2">
            <a class="btn btn-primary col-sm-1  mt-2 ms-2" href="../index.php" role="button">Retour</a>
        </div>
    </form>

    <?php
}
include('../commun/footer.php');
