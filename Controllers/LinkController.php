<?php
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
    
    //? SETTINGS PHP MAILER to send an email
    //datas to send email
    $receiver = $this->sender;
    $subject = "Message Portfolio - ajout de lien";
    
    $message = "Un nouveau lien a été ajouté." . "\n\n" . "Lien :" . $_POST["link"] . "Tag référence:" . $_POST["id_tag"];
    
    $answerSend = "Je vous remercie pour votre suggestion de lien. Si le lien est accepté, il sera visible sur cette page prochainement.";
    
    $answerError = "Le lien n'a pas été envoyé : {$this->mail->ErrorInfo}";
    
    //? Front controller function
     $this->sendMessage($receiver, $receiverName="", $subject, $message, $answerSend, $answerError);
    
    //reload page
    header("location:index.php?page=link&answer=$this->answer");
  }
}
