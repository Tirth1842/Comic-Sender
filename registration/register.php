<?php

session_start();
/**@var $pdo \PDO */
require_once "../database.php";

$mail_id = '';
$is_verified='';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    
    $mail_id = $_POST['email'];
    $is_verified=0;
    $is_sub = 0;
    $mail_cnt=0;
   // checking that the user already exists or not
    $sql = "SELECT COUNT(*) AS num , mail_id FROM `mail` WHERE mail_id = :email";
    $statement1 = $pdo->prepare($sql);
    $statement1->bindValue(':email',$mail_id);
    $statement1->execute();
    $row = $statement1->fetch(PDO::FETCH_ASSOC);

    // if exists alert that user already exists
    if($row['num'] > 0){

        $sql1 = "SELECT is_verified FROM `mail` WHERE mail_id = :email1";
        $statement11 = $pdo->prepare($sql1);
        $statement11->bindValue(':email1',$row['mail_id']);
        $statement11->execute();
        $row1 = $statement11->fetch(PDO::FETCH_ASSOC);
        
        //user already registerd but skip the verification part.
        // if it has not verified than user will get another otp 
        // else will not get the otp.
        if($row1['is_verified'] == 1)
        {
            echo "<script>alert('User already exist')</script>";
        }
        else
        {
            $_SESSION['mail'] = $mail_id;
            // echo $mail_id;
            echo "<script>window.location.href = 'registration_otp.php';</script>";
        }

        
    } 
    
    else{
        // else make entry in database.
        $statement = $pdo->prepare("INSERT INTO mail (mail_id, is_verified,is_sub,mail_cnt)
        VALUES (:mail_id, :is_verified, :is_sub,:mail_cnt) ");

        $statement->bindValue(':mail_id', $mail_id);
        $statement->bindValue(':is_verified', $is_verified);
        $statement->bindValue(':is_sub', $is_sub);
        $statement->bindValue(':mail_cnt', $mail_cnt);

        $statement->execute();
        //     echo '<pre>';
        //     var_dump($statement);
        //    echo '<pre>';

        
        $_SESSION['mail'] = $mail_id;
        echo "<script>window.location.href = 'registration_otp.php';</script>";

        // header("otp.php");
        //echo"<script> alert('successfully registered')</script>";

    }


    
    
}
?>













<?php include_once "../partial/header.php"?>

    
<style>
     body {
  background:linear-gradient(to right, #78a7ba 0%, #385D6C 50%, #78a7ba 99%);
}
    .signup-form {
        font-family: "Roboto", sans-serif;
        width:400px;
        height: 300px;
        margin:30px auto;
        background:linear-gradient(to right, #ffffff 0%, #fafafa 50%, #ffffff 99%);
        border-radius: 10px;
        
    }
    .form-header h1 {
            font-size: 30px;
            text-align:center;
            color:#666;
            padding:20px 0;
            border-bottom:1px solid #cccccc;
}
.form-header  {
  background-color: #EFF0F1;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}
.form-body .form-input {
    font-size: 17px;
    box-sizing: border-box;
    width: 100%;
    height: 34px;
    padding-left: 10px;
    padding-right: 10px;
    color: #333333;
    text-align: left;
    border: 1px solid #d6d6d6;
    border-radius: 4px;
    background: white;
    outline: none;
}
.label-title {
  
  color:#1BBA93;
  font-size: 17px;
  font-weight: bold;
}
.form-body {
  padding:10px 40px;
  color:#666;
}
.btn-1 {
    margin-left:110px;
    margin-top: 10px;
    width: 100px;
   /* display:inline-block; */
   padding:10px 20px;
   background-color: #1BBA93;
   font-size:17px;
   border:none;
   border-radius:5px;
   color:#bcf5e7;
   cursor:pointer;
}
.btn-1:hover {
  background-color: #169c7b;
  color:white;
}

</style>
<body>
  
    
       
       <form class="signup-form" action="" method="post">

     
                <div class="form-header">
                    <h1>Register</h1>
                </div>

      
            <div class="form-body">

                

                
                <div class="form-group">
                
                        <input type="email"  class="form-input" placeholder="Email Address" required="required" name="email">
                </div>
                <div>
                        <input type="submit" value="Register" id="Signin" class="btn-1">
                </div>
               
                
            </div>
            
        </form>
    
    

</html>