<?php
$title = "Ajouter un vinyle";
include '../commun/header.php';
include 'add_script.php';
$artists = artists();
if (isset($_POST['submit']) && count($formError) === 0) {
    ?>
    <div class="offset-3 mt-5">
        <p>le disque a été ajouté</p>
        <a class="btn btn-primary col-sm-1 ms-2" href="../index.php" role="button">Retour</a>
    </div>
<?php } else {
    ?>
    <div class="container-fluid">
    <h1>Ajouter un vinyle</h1>
    <form action="#" method="post" enctype="multipart/form-data" id="add" novalidate>
        <div class="form-group">
            <label for="title"> Title</label>
            <input class="form-control" name="title" id="title" placeholder="Enter title" ONFOCUSOUT="checkTitle()">
            <span id="spanTitle" class="text-danger"><?= isset($formError['title']) ? $formError['title'] : '' ?></span>
        </div>

        <div class="form-group">
            <label for="artist"> Artist</label>
            <select id="artist" name="artist" class="form-select" onfocusout="checkArtist()">
                <option selected></option>
                <?php foreach ($artists as $artist) { ?>
                    <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                <?php } ?>
            </select>
            <span id="spanArtist"
                  class="text-danger"><?= isset($formError['artist']) ? $formError['artist'] : '' ?></span>
        </div>

        <div class="form-group">
            <label for="year"> Year</label>
            <input class="form-control" type="text" name="year" placeholder="Enter year" id="year"
                   ONFOCUSOUT="checkYear()">
            <span id="spanYear" class="text-danger"> <?= isset($formError['year']) ? $formError['year'] : '' ?></span>
        </div>
        <div class="form-group">
            <label for="genre"> Genre</label>
            <input class="form-control" id="genre" type="text" name="genre"
                   placeholder="Enter genre (Rock,Popo, Prog,..." ONFOCUSOUT="checkGenre()">
            <span id="spanGenre" class="text-danger"><?= isset($formError['genre']) ? $formError['genre'] : '' ?></span>
        </div>
        <div class="form-group">
            <label for="label"> Label</label>
            <input class="form-control" type="text" name="label" placeholder="label (EMI, Warner, PolyGram, Universale"
                   id="label" ONFOCUSOUT="checkLabel()">
            <span id="spanLabel" class="text-danger"><?= isset($formError['label']) ? $formError['label'] : '' ?></span>
        </div>
        <div class="form-group">
            <label for="price"> Price</label>
            <input class="form-control" type="text" name="price" placeholder="Enter price" id="price"
                   ONFOCUSOUT="checkPrice()">
            <span id="spanPrice" class="text-danger"><?= isset($formError['price']) ? $formError['price'] : '' ?></span>
        </div>
        <div class="form-group">
            <label>picture</label>
            <input class="form-control" type="file" name="picture" id="picture" ONFOCUSOUT="checkPicture()">
            <small></small>
            <span id="spanPicture"
                  class="text-danger"><?= isset($formError['picture']) ? $formError['picture'] : '' ?> </span>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Ajouter" id="submit" class="btn btn-primary col-1 mt-2">
            <a class="btn btn-primary col-sm-1  mt-2 ms-2" href="../index.php" role="button">Retour</a>
        </div>
    </form>
    <script type="text/javascript" src="../asset/add_form.js"></script>
    <?php
}

include('../commun/footer.php');
