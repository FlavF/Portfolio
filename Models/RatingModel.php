<?php

class RatingModel extends ModelManager
{
    
    // How many Stars ?
    
    public function getStar1()
    {
        $req = "SELECT SUM(star_1) as sum1
        FROM Ratings";
        
        return $this -> queryFetchAll($req);
    }
    
    public function getStar2()
    {
        $req = "SELECT SUM(star_2)as sum2
        FROM Ratings";
        
        return $this -> queryFetchAll($req);
    }
    
    public function getStar3()
    {
        $req = "SELECT SUM(star_3)as sum3
        FROM Ratings";
        
        return $this -> queryFetchAll($req);
    }
    
    public function getStar4()
    {
        $req = "SELECT SUM(star_4)as sum4
        FROM Ratings";
        
        return $this -> queryFetchAll($req);
    }
    
    public function getStar5()
    {
        $req = "SELECT SUM(star_5)as sum5
        FROM Ratings";
        
        return $this -> queryFetchAll($req);
    }
    
    // calcul Sum of click
    public function getStarSum()
    {
        $req = "SELECT COUNT(id_rating) as sum
        FROM Ratings";
        
        return $this -> queryFetchAll($req);
    }
    
    // calcul average
    public function getStarAverage()
    {
        $req = "SELECT ROUND(AVG(value),2) as avg
        FROM Ratings";
        
        return $this -> queryFetchAll($req);
    }


    // Get IP adress to ban old Ip to vote again
    public function getStarAllIp($ip){
        $req = "SELECT ip_address
        FROM Ratings
        WHERE ip_address = ?";
        
        $param = [$ip];
        
        return $this -> queryFetchAll($req, $param);
    }
    
    // Add stars
    
    public function addStar(?int $star1,?int $star2,?int $star3,?int $star4,?int $Star5,int $value, string $ip)
    {
        $req = "INSERT INTO Ratings(star_1,star_2,star_3,star_4,star_5,value,ip_address) 
        VALUES(?,?,?,?,?,?,?)";
        
        $param = [$star1,$star2,$star3,$star4,$Star5,$value,$ip];
        $this-> query($req,$param);
    }
    
    
    
    
    
    
}