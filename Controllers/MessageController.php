<?php 

class MessageController extends FrontController{
    
    public function __construct()
    {
        parent::__construct();     
    }
    
    public function display(){
        // templates page
        $template = "message.phtml";
        include "Views/layout.phtml";
    } 
    
    public function submitForm()
    {
        // if the form is send
        if(isset($_POST['submit']))
        {
            //datas to send email
            $receiver = trim($_POST['email']);
            $receiverName = trim($_POST['name']);
            
            $subject = "Message Portfolio de ".$this->senderName . " - De ". $receiverName;
            
            $message = "Bonjour " . $receiverName . ", " ."\n\n" . "Vous avez écrit:" . "\n\n" . $_POST['message']. "\n\n" . " Je vous remercie pour votre message et reviens vers vous au plus vite. ". "\n\n" . $this->senderName;
            
            $answerSend = "Votre email a bien été envoyé. Je vous remercie " . $receiverName . ".";

            $answerNoEmailAddress = "Votre email n'a pas été renseigné. Votre message ne peut donc pas être envoyé.";
            
            $answerError = "Votre email n'a pas été renseigné. Votre message ne peut donc pas être envoyé.";
            
            // if not email of receiver
            if(empty($receiver)){
                $this->answer = $answerNoEmailAddress;
            }
            else{
                //? Front controller function
                $this->sendMessage($receiver, $receiverName, $subject, $message, $answerSend, $answerError);
            }
            // to reload the page with ok or not
            header("location: index.php?page=message&response=$this->answer");
        }
    }
    
    
}

?>