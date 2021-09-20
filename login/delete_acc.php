<?php

    /**@var $pdo \PDO */
    require '../database.php';

    $mail_id = $_GET['mail'];

    $statement = $pdo->prepare("DELETE FROM mail WHERE mail_id = :mail");
    $statement->bindValue('mail',$mail_id);
    $statement->execute();

    echo "<script>window.location.href = '../index.php';</script>";

