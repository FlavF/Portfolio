<?php

class LinkModel extends ModelManager
{
    
    //show links list
    public function getLinks()
    {
        $req = "SELECT DISTINCT id_link, link, url, title, 
        Categories.category as category, Categories.number as number
        FROM  Links
        INNER JOIN Categories ON Categories.id_category = Links.id_category
        ORDER BY link;";

        return $this -> queryFetchAll($req);
    }
    





}