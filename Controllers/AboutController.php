<?php

class AboutController extends FrontController
{
    public function display()
    {
            // templates page
        $template = "about.phtml";
        include "Views/layout.phtml";
    }

}