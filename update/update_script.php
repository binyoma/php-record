<?php
include('../commun/functions.php');
// déclaration d'un tableau d'erreur
$formError = [];
// déclaration des regex
$global="/^[0-9A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ \.,?;:!§=+\-_°@()&\"\'\[\]\#\~²]{0,1030}$/";
$lettres="/^[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{0,100}$/";
$nombres="/^[0-9\., ]{0,1030}$/";
// si le formulaire est soumis
if(isset($_POST['submit'])) {
    // si le post title du disque n'est pas vide
    if(!empty($_POST['title'])) {
        // si les données correspondent aux attentes
        if(preg_match($lettres, $_POST['title'])) {
            // on stock la donnée saisie dans une variable
            $title = htmlspecialchars($_POST['title']);
        } else {
            $formError['title'] = 'error on title';
        }
    } else {
        $formError['title'] = ' Title is empty';
    }
// si le post artist n'est pas vide
    if(!empty($_POST['artist'])) {
        // si les données correspondent aux attentes
        if(preg_match($nombres, $_POST['artist'])) {
            // on stock la donnée saisie dans une variable
            $artist = htmlspecialchars($_POST['artist']);
        } else {
            $formError['artist'] = "error on artist";
        }
    } else {
        $formError['artist'] = 'Artist is empty';
    }
    // si le post disc year n'est pas vide
    if(!empty($_POST['year'])) {
        // si les données correspondent aux attentes
        if(preg_match($nombres, $_POST['year'])) {
            // on stock la donnée saisie dans une variable
            $year = htmlspecialchars($_POST['year']);
        } else {
            $formError['year'] = "error on year";
        }
    } else {
        $formError['year'] = ' Year is empty';
    }
    // si le post genre n'est pas vide
    if(!empty($_POST['genre'])) {
        // si les données correspondent aux attentes
        if(preg_match($lettres, $_POST['genre'])) {
            // on stock la donnée saisie dans une variable
            $genre = htmlspecialchars($_POST['genre']);
        } else {
            $formError['genre'] = 'error on Genre';
        }
    } else {
        $formError['genre'] = ' Genre is empty';
    }
    // si le post Label n'est pas vide
    if(!empty($_POST['label'])) {
        // si les données correspondent aux attentes
        if(preg_match($lettres, $_POST['label'])) {
            // on stock la donnée saisie dans une variable
            $label = htmlspecialchars($_POST['label']);
        } else {
            $formError['label'] = 'error on Label';
        }
    } else {
        $formError['label'] = ' Label is empty';
    }
    // si le post price n'est pas vide
    if(!empty($_POST['price'])) {
        // si les données correspondent aux attentes
        if(preg_match($nombres, $_POST['price'])) {
            // on stock la donnée saisie dans une variable
            $price = htmlspecialchars($_POST['price']);
        } else {
            $formError['price'] = 'error on price';
        }
    } else {
        $formError['price'] = ' Price is empty';
    }
    // si le post picture n'est pas vide
    if(!empty($_FILES['picture'])) {
        // si les données correspondent aux attentes
        // On met les types autorisés dans un tableau (ici pour une image)
        $aMimeTypes = array( "image/jpeg", "image/pjpeg", "image/png", "image/x-png");

        // On extrait le type du fichier via l'extension FILE_INFO
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $_FILES["picture"]["tmp_name"]);
        finfo_close($finfo);
        if (in_array($mimetype, $aMimeTypes)) {
            // on stock la donnée saisie dans une variable
            switch ($mimetype) {
                case "image/jpeg":
                    $extension=".jpeg";
                    break;
                case "image/pjpeg":
                    $extension=".jpeg";;
                    break;
                case"image/png":
                    $extension=".png";;
                    break;
                case "image/x-png":
                    $extension=".png";
                    break;
            }
            $picture=$title.$extension;
        } else {
            $formError['picture'] = 'error on picture';
        }
    } else {
        $formError['picture'] = ' Picture not uploaded';
    }
    $id=$_POST['id'];


    if ( count($formError) === 0){
        $db=connexion();
        $sql="UPDATE disc
            SET disc_title=:title, disc_year=:year, disc_picture=:picture,disc_label=:label,
                disc_genre=:genre,disc_price=:price,artist_id=:artist
            WHERE disc_id=:id";

        $stmt=$db->prepare($sql);
        $stmt->execute(array(
            'title'=>$title,
            'year'=>$year,
            'picture'=>$picture,
            'label'=>$label,
            'genre'=>$genre,
            'price'=>$price,
            'artist'=>$artist,
            'id'=>$id
        ));
        move_uploaded_file($_FILES['picture']['tmp_name'], '../pictures/' . $picture);
    }
}
