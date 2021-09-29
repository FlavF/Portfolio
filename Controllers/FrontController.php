<?php

class FrontController
{
  //  public $menusAside;
  // 
//
  //  /*** Class constructor */
  //  public function __construct()
  //  {
  //      $this-> setMenu();
  //  }
  //  
  //  // for aside
  //  public function setMenu (){
  //      // get the elements from the table Menu
  //      $modelAside = new MenuModel();
  //      $this -> menusAside = $modelAside -> getMenuAside();
  //  }
  //  


  //todo: à faire fonctionner
public function getBrowser()
{
echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";

$browser = get_browser(null, true);
print_r($browser);

}



    //cookie : don't eat it
    public function createCookie()
    {
        setcookie('test',true,time()+365*24*3600);
    }
}
