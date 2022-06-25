<?php 
use PHPMailer\PHPMailer\PHPMailer;
require_once "config/PHPMailer/SMTP.php";
require_once "config/PHPMailer/Exception.php";
require_once "config/PHPMailer/PHPMailer.php";

class MessageController{
    public function display(){
        // templates page
        $template = "message.phtml";
        include "Views/layout.phtml";
    } 
    
    public function submitForm()
    {
        $mail = new PHPMailer();
        
        if(isset($_POST['submit']))
        {
            //data to modify
            $clientEmail = $_POST['email']; // this is client Email
            $name = $_POST['name'];
            $devEmail = $this->myEmail; // this is the dev Email
            $passW = $this->myPassword;
            $subject = "Message Portfolio FlavDev - De ". $name;
            $message = "Bonjour " . $name . ", " ."\n\n" . "Vous avez écrit:" . "\n\n" . $_POST['message']. "\n\n" . " Je vous remercie pour votre message et reviens vers vous au plus vite. ". "\n\n" . "FlavDev";
            
            if(empty($clientEmail)){
                $response = "Votre email n'a pas été renseigné. Votre message ne peut donc pas être envoyé.";
            }
            else{
                try{
                    //smtp settings
                    $mail->CharSet = 'UTF-8';
                    $mail->Encoding = 'base64';
                    $mail->isSMTP();
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = '587';
                    // 465;
                    // '587';
                    $mail->SMTPAuth = true;
                    $mail->Username = $devEmail;
                    $mail->Password = $passW;
                    
                    //email settings
                    $mail->setFrom($devEmail, "FlavDev");
                    $mail->addAddress($clientEmail, $name);
                    $mail->addBCC($devEmail, "FlavDev");
                    
                    // Set email format to HTML
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body = $message;
                    
                    $mail->send();
                    
                    $response = "Votre email a bien été envoyé. Je vous remercie " . $name . ".";
                }
                                
                catch(Exception $e)
                {
                $response = "Email non envoyé.". $e->getMessage();
                 }
            }
        // to reload the page with ok or not
        header("location: index.php?page=message&response=$response");
    }
}


}

?>