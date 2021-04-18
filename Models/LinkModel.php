<?php

class LinkModel extends ModelManager
{
    
    //show links list
    public function getLinks()
    {
        $req = "SELECT id_link, link, url, alt, target, icon 
        FROM  Links
        ORDER BY link";
        return $this -> queryFetchAll($req);
    }
    
    // update link
    public function updateLink($link,$url,$alt,$target,$icon,$id)
    {
        $req = "UPDATE Links 
        SET  link= ?, url=?, alt=?, target=?, icon=?
        WHERE id_link=?";
        
        $this -> query($req,[$link,$url,$alt,$target,$icon,$id]);
    }

      // add link
    public function addLink($link,$url,$alt,$target,$icon)
    {
       $req = "INSERT INTO Links (link, url, alt, target, icon) 
       VALUES(?,?,?,?,?)";
       $this-> query($req,[$link,$url,$alt,$target,$icon]);
    }
    
    // delete link
     public  function deleteLink($id)
    {
        $req = "DELETE FROM Links
        WHERE id_link =?";
        $this -> query($req,[$id]);
    }

}