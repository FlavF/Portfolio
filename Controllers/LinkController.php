<?php

class LinkController extends FrontController
{
    public function display()
    {
        $model = new LinkModel();
        $links = $model -> getLinks();


        // templates page
        $template = "link.phtml";
        include "Views/layout.phtml";
    }

}