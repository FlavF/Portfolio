<?php

class PageController extends FrontController
{
    public function display()
    {
            // templates page
        $template = "page.phtml";
        include "Views/layout.phtml";
    }

}