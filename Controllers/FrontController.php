<?php

class FrontController
{
  // For PHP MAILER
  protected $myEmail;
  protected $password;
  
  public function __construct()
  {
    //? datas for phpmailer
    $datasEmail = parse_ini_file("./config/email.ini");
    $this->myEmail = $datasEmail['MAILER_EMAIL'];
    $this->myPassword = $datasEmail['MAILER_PASSWORD'];          
  }
    
  //todo: à faire fonctionner
  public function getBrowser()
  {
    echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
    
    $browser = get_browser(null, true);
    print_r($browser);
    
  }
  
  
}
