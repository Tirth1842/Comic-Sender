<?php

 session_start();
if ($_SESSION['veri'] != '1')
{
     echo "<script>window.location.href = 'login.php';</script>";
}
/**@var $pdo \PDO */
require "../database.php";

$mail = $_SESSION['mail'];
    // $mail = "tirthpatel.1842000@gmail.com";

?>


<?php include_once "../partial/header.php"?>


<style>
     body {
  background:linear-gradient(to right, #78a7ba 0%, #385D6C 50%, #78a7ba 99%);
}

.container {
        font-family: "Roboto", sans-serif;
        width:600px;
        height: 400px;
        margin:30px auto;
        background:linear-gradient(to right, #ffffff 0%, #fafafa 50%, #ffffff 99%);
        border-radius: 10px;
        
        
    }
    
    h1{
        
        margin-left: 30px;
        color: blueviolet;
    }
    .content{
        margin-left: 30px;
    }
    .btn{
        margin-top: 60px;
        margin-left: 170px;
    }
    .btn-0 {
        text-decoration: none;
        margin-left:300px;
        /* margin-top: 80px; */
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
    .btn-0:hover {
        background-color: #169c7b;
        color:white;
    }
    .btn-1 {
        text-decoration: none;
        margin-left:20px;
        /* margin-top: 80px; */
        width: 100%;
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
    <div class="container">
        <div class="head">
            <h1><b>Welcome,</b> <a href="logout.php" class="btn-0" >Logout</a></h1>
        
        </div>
        <div class="content">
            <div>
                <?php echo $mail;?>
            </div>
            <br>
            



                    <?php
            
                   
                       $sql1 = "SELECT mail_cnt FROM `mail` WHERE mail_id = :email";
                       $statement11 = $pdo->prepare($sql1);
                       $statement11->bindValue(':email',$mail);
                       $statement11->execute();
                       $row1 = $statement11->fetch(PDO::FETCH_ASSOC);
                       $count=  $row1['mail_cnt'];
                    ?>
            
            <p>Total Mail Send Till today = <b><?php echo $count;?></b></p>

                
                
                    <?php
   
                       $sql11 = "SELECT is_sub FROM `mail` WHERE mail_id = :email";
                       $statement111 = $pdo->prepare($sql11);
                       $statement111->bindValue(':email',$mail);
                       $statement111->execute();
                       $row11 = $statement111->fetch(PDO::FETCH_ASSOC);
                       $count1=  $row11['is_sub'];

                        if ($count1 == '1')
                        {
                            $sub_unsub_btn = "Un-Subcribe";
                        }
                        else
                        {
                            $sub_unsub_btn = "Subcribe";
                        }

                    ?>


            <br>
            <div class="btn">
                <a href="sub_unsub.php?mail=<?php echo $mail;?>&id=<?php echo $count1?>" class="btn-1" id="sub_unsub"><?php echo $sub_unsub_btn;?></a>
                <br>
                <br>
                <br>
                <a href="dele_acc.php" class="btn-1">Delete Account</a>
            
                
            </div>
            
        </div>
        
    </div>
    
</body>


</html>
