<?php

	// session started 
	session_start();
	$mail_ = $_SESSION['mail'];// getting the mail id from session.
	
    require "../otp/otp.php";


	$_SESSION['otp'] = $otp;
    echo "<script>window.location.href = 'verify_otp.php';</script>";


?>