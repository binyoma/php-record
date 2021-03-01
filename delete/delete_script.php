<?php
if(isset($_POST['submit'])) {
    $db=connexion();
    $sql="DELETE FROM disc
            WHERE disc_id=:id";

    $stmt=$db->prepare($sql);
    $stmt->execute(array('id'=>$_POST['id']));
}