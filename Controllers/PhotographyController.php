<?php

class PhotographyController extends FrontController
{
    public function display()
    {
            // templates page
        $template = "photography.phtml";
        include "Views/layout.phtml";
    }

}