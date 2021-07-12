<?php

class ProjectController extends FrontController
{
    public function display()
    {
        
        //project tables
        $model = new ProjectModel();
        $projects = $model -> getProjects();

        //project tables
        $modelLanguages = new ProjectModel();
        $languages = $modelLanguages -> getProjectsLanguages();
               
        // templates page
        $template = "project.phtml";
        include "Views/layout.phtml";
    }

}