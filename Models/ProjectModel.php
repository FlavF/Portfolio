<?php

class ProjectModel extends ModelManager
{

     public function getProjects()
    {
        $req = "SELECT DISTINCT Projects.name as project, description, Projects.src as src, Projects.alt as alt, data_base, data_base_alt
        FROM Projects";

        return $this -> queryFetchAll($req);
    }
    
    //show all items 
    public function getProjectsCategories()
    {
        $req = "SELECT DISTINCT Projects.name as project,Languages_it.name as languages_IT
        FROM Projects_categories
        LEFT JOIN Projects
         ON Projects_categories.id_project = Projects.id_project
        LEFT JOIN Languages_it 
         ON Projects_categories.id_language_it = Languages_it.id_language_it";

        return $this -> queryFetchAll($req);
    }
    
         
    
}