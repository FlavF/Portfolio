<?php

class LinkModel extends ModelManager
{
    
    //show links list
    public function getLinks()
    {
        $req = "SELECT DISTINCT link, url, title, id_link_tag as id_tag, level
        FROM  Links
        ORDER By id_tag";
    
        return $this -> queryFetchAll($req);
    }

    //show links list
    public function getTags()
    {
        $req = "SELECT id_link_tag as id_tag, link_tag as tag
        FROM  Links_tags
        ORDER BY tag";

        return $this -> queryFetchAll($req);
    }
    
 // add link
    public function addLink(string $link,string $url,string $title,int $tag,int $level)
    {
        $req = "INSERT INTO Links (link, url, title, id_link_tag, level) 
        VALUES(?,?,?,?,?)";
        
        $parameters = [$link,$url,$title,$tag,$level];
        
        $this-> query($req,$parameters);
    }
 
}