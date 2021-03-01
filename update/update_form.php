<?php
$title = "Modifier un vinyle";
include('../commun/header.php');
include('update_script.php');
$disc = details();
$artists = artists();
if (isset($_POST['submit']) && count($formError) === 0) {
    ?>
    <div class="offset-3 mt-5">
        <p>le disque a été modifié</p>
        <a class="btn btn-primary col-sm-1 ms-2" href="../index.php" role="button">Retour</a>
    </div>
<?php } else {
    ?>
    <div class="container-fluid">
    <h1>Modifier un vinyle</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title"> Title</label>
            <input class="form-control" name="title" id="title"
                   value="<?= $disc->disc_title ?>" ONFOCUSOUT="checkTitle()">
            <span id="spanTitle" class="text-danger"><?= isset($formError['title']) ? $formError['title'] : '' ?></span>
        </div>

        <div class="form-group">
            <label for="artist"> Artist</label>
            <select id="artist" name="artist" class="form-select" onfocusout="checkArtist()">
                <option value="<?= $disc->artist_id ?>" class="selected"><?= $disc->artist_name ?></option>
                <?php foreach ($artists as $artist) { ?>
                    <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                <?php } ?>
            </select>
            <span id="spanArtist"
                  class="text-danger"><?= isset($formError['artist']) ? $formError['artist'] : '' ?></span>
        </div>

        <div class="form-group">
            <label for="year"> Year</label>
            <input class="form-control" type="text" name="year" id="year" value="<?= $disc->disc_year ?>"
                   ONFOCUSOUT="checkYear()">
            <span id="spanYear" class="text-danger"> <?= isset($formError['year']) ? $formError['year'] : '' ?></span>
        </div>
        <div class="form-group">
            <label for="genre"> Genre</label>
            <input class="form-control" id="genre" type="text" name="genre" value="<?= $disc->disc_genre ?>"
                   ONFOCUSOUT="checkGenre()">
            <span id="spanGenre" class="text-danger"><?= isset($formError['genre']) ? $formError['genre'] : '' ?></span>
        </div>
        <div class="form-group">
            <label for="label"> Label</label>
            <input class="form-control" type="text" name="label" value="<?= $disc->disc_label ?>" id="label"
                   ONFOCUSOUT="checkLabel()">
            <span id="spanLabel" class="text-danger"><?= isset($formError['label']) ? $formError['label'] : '' ?></span>
        </div>
        <div class="form-group">
            <label for="price"> Price</label>
            <input class="form-control" type="text" name="price" value="<?= $disc->disc_price ?>" id="price"
                   ONFOCUSOUT="checkPrice()">
            <span id="spanPrice" class="text-danger"><?= isset($formError['price']) ? $formError['price'] : '' ?></span>
        </div>
        <div class="form-group">
            <label>picture</label>
            <input class="form-control-plaintext" type="file" name="picture" id="picture" ONFOCUSOUT="checkPicture()">
            <img src="pictures/<?= $disc->disc_picture ?>" width=300 height=100 class="img-fluid "
                 alt="<?= $disc->disc_name ?>">
            <span id="spanPicture"
                  class="text-danger"><?= isset($formError['picture']) ? $formError['picture'] : '' ?> </span>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?= $disc->disc_id ?>">
            <input type="submit" name="submit" value="Modifier" id="submit" class="btn btn-primary col-1 mt-2">
            <a class="btn btn-primary col-sm-1  mt-2 ms-2" href="../index.php" role="button">Retour</a>
        </div>
    </form>
    <script type="text/javascript" src="../asset/add_form.js"></script>
    <?php
}
include('../commun/footer.php');