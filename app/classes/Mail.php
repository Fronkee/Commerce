<?php

 namespace App\Classes;

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
  class Mail{
      
      private $mail;
       public function __construct()
       {
           $this->mail =  new PHPMailer();
             /**
              * production 
              * local
              * Server settings
              */
              
              if($_ENV['APPENV'] === 'local'){
                $this->mail ->SMTPDebug = $_ENV['SMTP_DENUG'];    //Enable verbose debug output
              } 

            $this->mail ->isSMTP();                                            //Send using SMTP
            $this->mail ->Host       =  $_ENV['SMTP_HOST'];                      //Set the SMTP server to send through
            $this->mail ->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mail ->Username   =  $_ENV['USER_NAME'];                     //SMTP username
            $this->mail ->Password   =  $_ENV['USER_PASS'];                                //SMTP password
            $this->mail ->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $this->mail ->Port       = $_ENV['SMTP_PORT'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
          
        }
        public function mailSend($data){
            try {
                //Recipients
                $this->mail->setFrom($_ENV['USER_NAME'], $_ENV['COMPANY']);
                $this->mail->addAddress($data['to'],$data['to_name']);     //Add a recipient
              
                //Content
                $this->mail->isHTML(true);                                  //Set email format to HTML
                $this->mail->Subject =$data['subject'];
                $this->mail->Body    =mailMake($data['filename'],$data);
                $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $this->mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: { $this->mail->ErrorInfo}";
            }
        }    
           
     
  }