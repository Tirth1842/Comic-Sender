<?php

// this page will subscribe and unsubscribe.
$mail = $_GET["mail"];
$cnt = $_GET["id"];
// echo $mail;

    if ($cnt == "1")
    {
        $val = 0;
        $val1 = "Un-Subcribed Sucssecfully";
    }
    else if ($cnt == "0")
    {
        $val = 1;
        $val1 = "Subcribed Sucssecfully";
    }
    else
    {

    }


    /**@var $pdo \PDO */
    require '../database.php';
    $sql = "UPDATE mail SET is_sub = $val WHERE mail_id = :mail_id ";
    // echo $sql;
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':mail_id',$mail);
    $statement->execute();

    echo "<script>alert('".$val1."')</script>";
    echo "<script>window.location.href = 'home.php';</script>";


?>