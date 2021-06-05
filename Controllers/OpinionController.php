<?php

class OpinionController extends FrontController
{
    public function display()
    {
            // templates page
        $template = "opinion.phtml";
        include "Views/layout.phtml";
    }

}