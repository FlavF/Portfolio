<?php

class LinkModel extends ModelManager
{
    
    //show links list
    public function getLinks()
    {
        $req = "SELECT DISTINCT link, url, title, id_link_tag as id_tag
        FROM  Links";
    

        return $this -> queryFetchAll($req);
    }



    //show links list
    public function getTags()
    {
        $req = "SELECT id_link_tag as id_tag, link_tag as tag
        FROM  Links_tags";

        return $this -> queryFetchAll($req);
    }
    

    




}