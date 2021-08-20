<?php

class LinkController extends FrontController
{
    public function display()
    {
        // Tags table
        $model = new LinkModel();
        $tags = $model -> getTags();

        // Links table
        $model = new LinkModel();
        $links = $model -> getLinks();


        // templates page
        $template = "link.phtml";
        include "Views/layout.phtml";
    }

}