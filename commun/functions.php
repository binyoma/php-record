<?php
// connexion à la base
function connexion(){
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'root', 'Code');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

// extrait tous les disques
function record ()
{
    $req = connexion()->query("select * from disc inner join artist on disc.artist_id = artist.artist_id");
    $disques = $req->fetchAll(PDO::FETCH_OBJ);
    $req->closeCursor();
    return $disques;
}
// ramène les détails d'un disque
function details(){
    $req= connexion()->prepare("select * from disc inner join artist on disc.artist_id = artist.artist_id where disc_id=?");
    $req->execute(array($_GET["disc_id"]));
    $disc = $req->fetch(PDO::FETCH_OBJ);
    return $disc;
}
// ramène les artistes
function artists(){
    $req=connexion()->query("select * from artist");
    $artists = $req->fetchAll(PDO::FETCH_OBJ);
    $req->closeCursor();
    return $artists ;
}
// modifier disque
function modifier(){

    $db= connexion();
    $db->query("UPDATE disc SET disc_title=$disc_title , disc_year=$year ,disc_label= $label , disc_genre= $genre ,disc_price= $price ,artist_id=$artist where disc_id=$id");
}

