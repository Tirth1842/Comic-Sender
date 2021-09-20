
 <?php include_once "../partial/header.php"?>
<style>
    .verify{
        color: lightgreen;
    }
</style>
<body>
    <form method="post">
        <input type="text" pattern="[0-9]{6}" name="otp" required="required">
        <input type="submit" name="btn" value="Verify">
        <a href="login_otp.php">Re-send OTP</a>
        <div id="content" class="verify">
            <p>OTP has been send to your mail id</p>
        </div>
    </form>
</body>
</html>



<?php
session_start();


    
    // verification of otp.
    $otp = $_SESSION['otp'];
    //echo $otp;
    $mail_id = $_SESSION["mail"];
    if(isset($_POST['btn']))
    {
        $get_otp = $_POST['otp'];
        
        if($get_otp == $otp)
        {
            echo "<script>window.location.href = 'home.php';</script>";
        }
        else
        {
            echo "wrong otp";
        }
    }
?>