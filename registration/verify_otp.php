
<?php include_once "../partial/header.php"?>
<style>
    .verify{
        color: red;
    }
</style>
<body>
    <form method="post">
        <input type="text" pattern="[0-9]{6}" name="otp" required="required">
        <input type="submit" name="btn" value="Verify">
        <a href="register_otp.php">Re-send OTP</a>
        <div id="content" class="verify">
            <p>OTP has been send to your mail id</p>
        </div>
    </form>
</body>
</html>



<?php
session_start();
/**@var $pdo \PDO */
require_once "../database.php";

    
    // verification of otp.
    $otp = $_SESSION['otp'];
    $mail_id = $_SESSION["mail"];
    if(isset($_POST['btn']))
    {
        $get_otp = $_POST['otp'];
        
        if($get_otp == $otp)
        {
            
            $statement = $pdo->prepare("UPDATE mail SET is_verified = 1 , is_sub = 1 WHERE mail_id = :mail_id");
            $statement->bindValue('mail_id',$mail_id);
            $statement->execute();
            echo "<script>window.location.href = '../index.php';</script>";
        }
        else
        {
            echo "wrong otp";
        }
    }
?>