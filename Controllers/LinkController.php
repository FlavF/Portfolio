<?php

use PHPMailer\PHPMailer\PHPMailer;
require_once "config/PHPMailer/SMTP.php";
require_once "config/PHPMailer/Exception.php";
require_once "config/PHPMailer/PHPMailer.php";



class LinkController extends FrontController
{
  
  public function __construct()
  {
    parent::__construct();     
  }
  
  public function display()
  {
    // Links table
    $model = new LinkModel();
    $links = $model->getLinks();
    
    // Tags table
    $model = new LinkModel();
    $tags = $model->getTags();
    
    // Links&Tags table
    $model = new LinkModel();
    $linksTags = $model->getLinksTags();
    
    // templates page
    $template = "link.phtml";
    include "Views/layout.phtml";
  }
  
  public function add()
  {
    $level = 0;
    
    //var_dump($_POST);
    // get the elements from the table
    $model = new LinkModel();
    $addLink = $model->addLink(
      (string) $_POST['link'],
      (string) $_POST['url'],
      (string) $_POST['title'],
      (int) $_POST['id_tag'],
      (int) $level
    );
    
    //* SETTINGS PHP MAILER to send an email
     
    //datas for phpMailer
    $devEmail = $this->myEmail; // this is the dev Email
    $subject = "Message Portfolio - ajout de lien";
    $message = "Un nouveau lien a été ajouté." . "\n\n" . "Lien :" . $_POST["link"] . "Tag référence:" . $_POST["id_tag"];
    $passW = $this->myPassword;
    
    //Create an instance; passing `true` enables exceptions
    //$mail = new PHPMailer();
    
    $mail = new PHPMailer();
    
    try {
      //Server settings
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
      $mail->isSMTP();                              //Send using SMTP
      $mail->Host       = "smtp.gmail.com";          //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = $devEmail;           //SMTP username
      $mail->Password   = $passW;                     //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  //Enable implicit TLS encryption
      $mail->Port       = 465;         //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
      
      //Recipients
      $mail->setFrom($devEmail, 'Flavia Dev');
      $mail->addAddress($devEmail, 'Flavia Dev');     //Add a recipient
      
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body    = $message;
      
      $mail->send();
      
      $answer = "Je vous remercie pour votre suggestion de lien. Si le lien est accepté, il sera visible sur cette page prochainement.";
    } catch (Exception $e) {
      $answer = "Le lien n'a pas été envoyé : {$mail->ErrorInfo}";
    }
    
    //reload page
    header("location:index.php?page=link&answer=$answer");
  }
}
