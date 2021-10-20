<?php 
use PHPMailer\PHPMailer\PHPMailer;
require_once "Assets/PHPMailer/SMTP.php";
require_once "Assets/PHPMailer/Exception.php";
require_once "Assets/PHPMailer/PHPMailer.php";


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
            $devEmail = "flaviaf91@gmail.com"; // this is the dev Email
            $name = $_POST['name'];
            $subject = "Message Portfolio - ";
            $message = $name . " " . " a ecrit:" . "\n\n" . $_POST['message'];
            $passW = "Bisounours4785";
            
            try{
                //smtp settings
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = $devEmail;
                $mail->Password = $passW;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = '587';
                
                //email settings
                $mail->setFrom($clientEmail, $name);
                $mail->addAddress($devEmail);
                $mail->addCC($clientEmail, $name);
                $mail->isHTML(true);
                
                $mail->Subject = $subject;
                $mail->Body = $message;
                
                $mail->send();

                if(empty($clientEmail)){
                    $response = "Votre email n'a pas été renseigné. Votre message ne peut donc pas être envoyé.";
                }
                else{
                    $response = "Votre email a bien été envoyé. Je vous remercie " . $name . ".";
                }
                
                
            }catch(Exception $e)
            {
                $response = "Email non envoyé.". $e->getMessage();
            }
            // to reload the page with ok or not
            header("location: index.php?page=message&response=$response");
        }
    }
    
    
}

?>