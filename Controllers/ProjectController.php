<?php

class ProjectController extends FrontController
{
    public function display()
    {
         //get Language IT
        $modelLanguageIT = new LanguagesItModel();
        $LanguagesIt = $modelLanguageIT -> getnameLanguagesIt();

        //project tables
        $model = new ProjectModel();
        $projects = $model -> getProjects();

        //project and table tables
        $modelLanguages = new ProjectModel();
        $languages = $modelLanguages -> getProjectsLanguages();
               
        // templates page
        $template = "project.phtml";
        include "Views/layout.phtml";
    }

}