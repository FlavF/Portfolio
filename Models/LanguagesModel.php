<?php

class LanguagesModel extends ModelManager
{
    
    //show all pictures
    public function getLanguages()
    {
        $req = "SELECT name,src, alt, level
        FROM  Languages";
        
        return $this -> queryFetchAll($req);
    }
    
}