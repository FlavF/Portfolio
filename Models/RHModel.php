<?php

class RHModel extends ModelManager
{
    public function getOld()
    {
        $req = "SELECT start_date, end_date, name, location, description,type  
        FROM RH
        ORDER BY end_date DESC";
        
        return $this -> queryFetchAll($req);
    }

}