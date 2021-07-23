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
    public function getProjectsLanguages()
    {
        $req = "SELECT DISTINCT Projects.name as project,Languages_IT.name as languages_IT
        FROM Projects_languages
        LEFT JOIN Projects
         ON Projects_languages.id_project = Projects.id_project
         LEFT JOIN Languages_IT 
          ON Projects_languages.id_language_it = Languages_IT.id_language_it";

        return $this -> queryFetchAll($req);
    }
    
         
    
}