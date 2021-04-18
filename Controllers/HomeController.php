<?php

class HomeController extends FrontController
{
    public function display()
    {
        // templates page
        $template = "home.phtml";
        include "Views/layout.phtml";
    }
    

}
