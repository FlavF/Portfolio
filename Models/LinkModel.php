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
    





}