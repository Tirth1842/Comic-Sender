<?php include_once "../partial/header.php"?>
<script type="text/javascript">
        
        
        // reload()

        // function reload()
        // {
        //     setTimeout(continueExecution, 300000) // Waits (5 mins) before continuing
        // }

        // function continueExecution()
        // {
        //     location.reload("sendimage.php");
        // }

</script>
<body>

</body>
</html>



<?php
    


    require 'getting_image.php';



    /**@var $pdo \PDO */
    require '../database.php';   //connecting to database.

    // this will get the time and date when the script will execute
    $date_time = date("Y-m-d h:i:s");
    $query123 = $pdo->prepare("INSERT INTO cron_table (date_time) VALUES (:date_time)");
    $query123->bindValue(':date_time',$date_time);
    $query123->execute();
    



    // getting the mail id that have subscribe for getting the mail.
    $query = $pdo->prepare("SELECT mail_id FROM mail WHERE is_sub = 1");
    $result = array();
    $query->execute();
            
    // looping over the all the mail id for sending the mail
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }

     
        


        //print_r($value['mail_id']);
        

        
        
        $_SESSION["veri"] = '1';

         $siteURL = 'https://'; 
         $siteURL = $siteURL.$_SERVER["SERVER_NAME"].dirname($_SERVER['REQUEST_URI']).'/'; 
        // $_SERVER["SERVER_NAME"] gives the name of the server for eg. www.chrome.com or localhost in ourcase
        // $_SERVER["REQUEST_URI"] gives the remaining part of the url i.e. sendemail/example.php 
        // using dirname will give the absolute path of the file.

         
          require 'config.php';
          require 'vendor/autoload.php'; 
          
          use \Mailjet\Resources;
          foreach ($result as $value) {
            
             $mail = $value['mail_id'];
             $unsubscribe = $siteURL.'unsubscribe.php?mail='.$mail;
            // increamenting the mail count .
            $statement = $pdo->prepare("UPDATE mail SET mail_cnt = mail_cnt+1 WHERE mail_id = :mail_id");
            $statement->bindValue(':mail_id',$mail);
            $statement->execute();

           
            $mj = new \Mailjet\Client(CREDENTIAL1, CREDENTIAL2,true,['version' => 'v3.1']);
            $body = [
              'Messages' => [
                [
                  'From' => [
                    'Email' => COMICSENDER,
                    'Name' => "comic sender"
                  ],
                  'To' => [
                    [
                      'Email' =>$mail,
                      'Name' => ""
                    ]
                  ],
                  'Subject' => "COMIC SENDER",
                  'TextPart' => "have fun with newest comics",
                  'HTMLPart' => " <a href='".$unsubscribe."'><button>Un subscribe</button> <img src=".$img_url.">",
                  'CustomID' => "AppGettingStartedTest",
                  'Attachments' => [
                    [
                        'ContentType' => "image/png",
                        'Filename' => "image.png",
                        'Base64Content' => base64_encode(file_get_contents('image.png'))
                    ]
                ]
                ]
              ]
            ];
            $response = $mj->post(Resources::$Email, ['body' => $body]);
            $response->success();
        }

?>    