<?php

class LinkModel extends ModelManager
{
    
    //show links list
    public function getLinks()
    {
        $req = "SELECT DISTINCT link, url, title,id_category
        FROM  Links";

        return $this -> queryFetchAll($req);
    }

    //show links list
    public function getCategories()
    {
        $req = "SELECT id_category, category
        FROM  Links_categories";

        return $this -> queryFetchAll($req);
    }
    





}