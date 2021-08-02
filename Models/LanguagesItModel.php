<?php

class LanguagesItModel extends ModelManager
{
    
    //show all pictures
    public function getLanguagesIt()
    {
        $req = "SELECT src, alt, percentage, color
        FROM  Languages_it";
        
        return $this -> queryFetchAll($req);
    }


     //show all pictures
    public function getnameLanguagesIt()
    {
        $req = "SELECT name
        FROM  Languages_it";
        
        return $this -> queryFetchAll($req);
    }
    
    
}