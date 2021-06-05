<?php
session_start();

// tell the error php
error_reporting(E_ALL);
ini_set("display_errors", 1);

//spl_autoload_register(); //for class & models
spl_autoload_register(function ($class) 
{
    if(stristr($class, 'controller'))
    {
        require 'Controllers/'.$class.'.php';
    }
    if(stristr($class, 'model'))
    {
        require 'Models/'.$class.'.php';
    }
});


// show page
if(!isset($_GET['page']))
{
    // default page
     $controller = new HomeController();
     $controller -> display();     
}
else 
{
    switch($_GET['page'])
    {
        // ========= FRONT ===================
    
        ///page Page
        case 'page':
            $controller = new PageController();
            $controller->display();
            break;   
            
               // **** Message **** 
             // get page message  
        case 'message':
            $controller = new MessageController();
            $controller->display();
            break;

            //send message
        case 'formMessage':
            $controller = new MessageController();
            $controller-> submitForm();
            break;





        // ========= BACK ===================
        // ========= Log IN and Log OUT ===================
        
        // display page formRegisterUser when click on the link index.php?page=formUser
        case 'backFormUser':
            $controller = new BackUserController();
            $controller->display();
            break;
            
        // add the new user when submit form index.php?page=register on formRegisterUser page 
        case 'register':
            $controller = new BackUserController();
            $controller->signUp();
            break;

        // sign in the session when submit index.php?page=signIn on formRegisterUser page 
        case 'signIn':
            $controller = new BackUserController();
            $controller->signIn();
            break;
                    
     //   case 'signOut':
     //       $controller = new BackUserController();
     //       $controller -> signOut();
     //       break;
     //       
            // ========= Protect pages===================
            // when we are logged on the back we go directly to the page dashboardBack
       


            // ========= DEFAULT ===================
        default:
            //page when errors
           $controller = new ErrorController();
           $controller->display();  
    }
                    
}
                