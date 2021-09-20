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
.alert{
    color:red;
    text-align: center;
    margin-top: 10px;
    font-family: sans-serif;
}

</style>
<body>
  
    
       
       <form class="signup-form" action="" method="post">

     
                <div class="form-header">
                    <h1>Login</h1>
                </div>

      
            <div class="form-body">

                

                
                <div class="form-group">
                
                <input type="email"  class="form-input" placeholder="Email Address" required="required" name="email">
                </div>
                <div>
                <input type="submit" value="login" id="Signin" name="login" class="btn-1">
                </div>
                <div id="alert" class="alert">

                </div>               
                
            </div>
            
        </form>


<?php
    session_start();
    /**@var $pdo \PDO */ 
    require "../database.php";
    if (isset($_POST["login"]))
    {   
        $mail = $_POST['email'];

            $sql = "SELECT is_verified FROM `mail` WHERE mail_id = :email";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':email',$mail);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            if($row['is_verified'] == 1){
                $_SESSION["mail"] = $_POST["email"];
                $_SESSION["veri"] = '1';

                echo "<script>window.location.href = 'login_otp.php';</script>";
            }
            else{
                echo "<script>document.getElementById('alert').innerHTML += 'Please register yourself';</script>";
            }
        
    }

?>
    

</html>