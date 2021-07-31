<?php

class CloudModel extends ModelManager
{
    
    //show links list
    public function getCloud()
    {
        $req = "SELECT DISTINCT tag
        FROM  CV_Cloud;";

        return $this -> queryFetchAll($req);
    }
    





}