<?php
// déclaration d'un tableau d'erreur
include('../commun/functions.php');
$formError = [];
// déclaration des regex
$global = "/^[0-9A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ \.,?;:!§=+\-_°@()&\"\'\[\]\#\~²]{0,1030}$/";
$lettres = "/^[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{0,100}$/";
$nombres = "/^[0-9\., ]{0,1030}$/";

// si le formulaire est soumis
if (isset($_POST['submit'])) {
    // si le post title du disque n'est pas vide
    if (!empty($_POST['title'])) {
        // si les données correspondent aux attentes
        if (preg_match($lettres, $_POST['title'])) {
            // on stock la donnée saisie dans une variable
            $title = htmlspecialchars($_POST['title']);
        } else {
            $formError['title'] = 'error on title';
        }
    } else {
        $formError['title'] = ' Title is empty';
    }
//  artist
    if (!empty($_POST['artist'])) {
        if (preg_match($nombres, $_POST['artist'])) {
            $artist = htmlspecialchars($_POST['artist']);
        } else {
            $formError['artist'] = "error on artist";
        }
    } else {
        $formError['artist'] = 'Artist is empty';
    }
    //disc year
    if (!empty($_POST['year'])) {
        if (preg_match($nombres, $_POST['year'])) {
            $year = htmlspecialchars($_POST['year']);
        } else {
            $formError['year'] = "error on year";
        }
    } else {
        $formError['year'] = ' Year is empty';
    }
    //  genre
    if (!empty($_POST['genre'])) {
        if (preg_match($lettres, $_POST['genre'])) {
            $genre = htmlspecialchars($_POST['genre']);
        } else {
            $formError['genre'] = 'error on Genre';
        }
    } else {
        $formError['genre'] = ' Genre is empty';
    }
    //  Label
    if (!empty($_POST['label'])) {
        if (preg_match($lettres, $_POST['label'])) {
            $label = htmlspecialchars($_POST['label']);
        } else {
            $formError['label'] = 'error on Label';
        }
    } else {
        $formError['label'] = ' Label is empty';
    }
    // price
    if (!empty($_POST['price'])) {
        if (preg_match($nombres, $_POST['price'])) {
            $price = htmlspecialchars($_POST['price']);
        } else {
            $formError['price'] = 'error on price';
        }
    } else {
        $formError['price'] = ' Price is empty';
    }

    // picture
    if (isset($_FILES['picture'])) {
        // On met les types autorisés dans un tableau (ici pour une image)
        $aMimeTypes = array("image/jpeg", "image/pjpeg", "image/png", "image/x-png");

        // On extrait le type du fichier via l'extension FILE_INFO
        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        $mimetype = finfo_file($finfo, $_FILES["picture"]["tmp_name"]);

        finfo_close($finfo);

        if (in_array($mimetype, $aMimeTypes)) {
            // on stocke l'extension de la photo saisie dans une variable
            switch ($mimetype) {
                case "image/jpeg":
                    $extension = ".jpeg";
                    break;
                case "image/pjpeg":
                    $extension = ".jpeg";;
                    break;
                case"image/png":
                    $extension = ".png";;
                    break;
                case "image/x-png":
                    $extension = ".png";
                    break;
            }
            $picture = $title . $extension;
        } else {
            $formError['picture'] = 'error on picture';
        }
    } else {
        $formError['picture'] = ' Picture not uploaded';
    }

   if ( count($formError) === 0){
        $db= connexion();
        $sth=$db->prepare("INSERT INTO disc (disc_title , disc_year ,disc_picture, disc_label , disc_genre ,disc_price ,artist_id)
            VALUES(:title, :year,:picture, :label , :genre ,:price, :artist) ");
        $sth->bindParam(':title',$title);
        $sth->bindParam(':year',$year);
        $sth->bindParam(':picture',$picture);
        $sth->bindParam(':label',$label);
        $sth->bindParam(':genre',$genre);
        $sth->bindParam(':price',$price);
        $sth->bindParam(':artist',$artist);
        $sth->execute();
        move_uploaded_file($_FILES['picture']['tmp_name'], '../pictures/' . $picture);
    }
}

