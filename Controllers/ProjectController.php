<?php

class ProjectController extends FrontController
{
    public function display()
    {
            // templates page
        $template = "project.phtml";
        include "Views/layout.phtml";
    }

}