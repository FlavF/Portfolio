<?php

class PictureModel extends ModelManager
{
    
    //show all pictures
    public function getPictures()
    {
        $req = "SELECT src, alt, percentage, color
        FROM  Pictures";
        
        return $this -> queryFetchAll($req);
    }
    
}