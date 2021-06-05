<?php

class LinkController extends FrontController
{
    public function display()
    {
            // templates page
        $template = "link.phtml";
        include "Views/layout.phtml";
    }

}