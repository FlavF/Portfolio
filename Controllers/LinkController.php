<?php

class LinkController extends FrontController
{
    public function display()
    {
        // Categories table
        $model = new LinkModel();
        $categories = $model -> getCategories();

        // Links table
        $model = new LinkModel();
        $links = $model -> getLinks();


        // templates page
        $template = "link.phtml";
        include "Views/layout.phtml";
    }

}