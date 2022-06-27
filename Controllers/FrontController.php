<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'config/PHPMailer-master/src/Exception.php';
require 'config/PHPMailer-master/src/PHPMailer.php';
require 'config/PHPMailer-master/src/SMTP.php';

class FrontController
{
  // For PHP MAILER
  protected string $sender;
  protected string $password;
  protected string $senderName;
  
  
  public function __construct()
  {
    //? datas for phpmailer
    $datasEmail = parse_ini_file("./config/email.ini");
    $this->sender = $datasEmail['MAILER_EMAIL'];
    $this->password = $datasEmail['MAILER_PASSWORD']; 
    $this->senderName = "FlavDev";
  
    // $this->sendMessage($this->receiver, $this->receiverName, $this->subject, $this->message, $this->answerSend, $this->answerError);       
  }
  
  public function sendMessage($receiver, $receiverName, $subject, $message, $answerSend, $answerError){
    
    $mail = new PHPMailer(true);

    
    try{
      //smtp settings
      $mail->isSMTP();
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      $mail->Host = "smtp.gmail.com";
      $mail->Port = 465;
      // 465;// '587';
      $mail->SMTPAuth = true;
      $mail->Username = $this->sender;
      $mail->Password = $this->password;
      
      //email settings
      if($this->sender === $receiver){
        $mail->setFrom($this->sender, $this->senderName);
        $mail->addAddress($this->sender, $this->senderName); 
      }
      else{
        $mail->setFrom($this->sender, $this->senderName);
        $mail->addAddress($receiver, $receiverName);
        $mail->addBCC($this->sender, $this->senderName);
      }
      
      // Set email format to HTML
      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body = $message;
      
      $mail->send();
      
      $answer = $answerSend;
    }
    
    catch(Exception $e)
    {
      $answer = $answerError;
    }
  }
  
  
  
  //todo: à faire fonctionner
  public function getBrowser()
  {
    echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
    
    $browser = get_browser(null, true);
    print_r($browser);
    
  }
  
  
}
