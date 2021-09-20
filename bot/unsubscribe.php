<?php

// this page is for unsubscribing the user.
$mail = $_GET["mail"];

    

    /**@var $pdo \PDO */
    require '../database.php';
    $sql = "UPDATE mail SET is_sub = 0 WHERE mail_id = :mail_id ";
    // echo $sql;
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':mail_id',$mail);
    $statement->execute();

    
    echo "<script>window.location.href = '../index.php';</script>";


?>