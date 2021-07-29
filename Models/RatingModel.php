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

    // calcul
        public function getStarSum()
    {
        $req = "SELECT COUNT(id_rating) as sum
        FROM Ratings";

        return $this -> queryFetchAll($req);
    }

       // todo
    //     public function getStarAverage()
    // {
     
    //     return $this -> queryFetchAll($req);
    // }




// Add stars

 public function addStar1($star1)
    {
       $req = "INSERT INTO Ratings($star_1) 
       VALUES(?)";

       $param = $star1;
       $this-> query($req,[$param]);
    }


    public function addStar2($star2)
    {
       $req = "INSERT INTO Ratings($star_2) 
       VALUES(?)";

       $param = $star2;
       $this-> query($req,[$param]);
    }

    public function addStar3($star3)
    {
       $req = "INSERT INTO Ratings($star_3) 
       VALUES(?)";

       $param = $star3;
       $this-> query($req,[$param]);
    }

    public function addStar4($star4)
    {
       $req = "INSERT INTO Ratings($star_4) 
       VALUES(?)";

       $param = $star4;
       $this-> query($req,[$param]);
    }

    public function addStar5($star5)
    {
       $req = "INSERT INTO Ratings($star_5) 
       VALUES(?)";

       $param = $star5;
       $this-> query($req,[$param]);
    }



 

}