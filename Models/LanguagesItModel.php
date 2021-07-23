<?php

class LanguagesItModel extends ModelManager
{
    
    //show all pictures
    public function getLanguagesIt()
    {
        $req = "SELECT src, alt, percentage, color
        FROM  Languages_IT";
        
        return $this -> queryFetchAll($req);
    }


     //show all pictures
    public function getnameLanguagesIt()
    {
        $req = "SELECT name
        FROM  Languages_IT";
        
        return $this -> queryFetchAll($req);
    }
    
    
}