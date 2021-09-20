<?php
	
	//echo $mail_;
	 $otp = rand(100000,999999);
    
    // following lines of code is for sending the mail
    // here we used sendGrid API for sending the mail.
    require '../bot/config.php';
    require '../bot/vendor/autoload.php'; 
          
          use \Mailjet\Resources;
          $mj = new \Mailjet\Client(CREDENTIAL1, CREDENTIAL2 ,true,['version' => 'v3.1']);
          $body = [
            'Messages' => [
              [
                'From' => [
                  'Email' => COMICSENDER,
                  'Name' => "comic sender"
                ],
                'To' => [
                  [
                    'Email' =>$mail_,
                    'Name' => ""
                  ]
                ],
                'Subject' => "COMIC SENDER",
                'TextPart' => "have fun with newest comics",
                'HTMLPart' => " <strong>Your OTP is ".$otp." </strong> ",
                'CustomID' => "AppGettingStartedTest"
              ]
            ]
          ];
          $response = $mj->post(Resources::$Email, ['body' => $body]);
          $response->success() ;
        