<?php
session_start();

// tell the error php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

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
    
        ///page About
        case 'about':
            $controller = new AboutController();
            $controller->display();
            break;   

        ///page Project
        case 'project':
            $controller = new ProjectController();
            $controller->display();
            break;   

        ///page Photography
        case 'photography':
            $controller = new PhotographyController();
            $controller->display();
            break;   
            
        ///page Link
        case 'link':
            $controller = new LinkController();
            $controller->display();
            break;   

        ///page add Link
        case 'addLink':
            $controller = new LinkController();
            $controller->add();
            break;  

        ///page Opinion
        case 'opinion':
            $controller = new OpinionController();
            $controller->display();
            break;   

        case 'addStars':
            $controller = new OpinionController();
            $controller->addStars();
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
       

            // ========= DEFAULT ===================
        default:
            //page when errors
           $controller = new ErrorController();
           $controller->display();  
    }
                    
}
                