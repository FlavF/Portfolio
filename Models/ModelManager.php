<?php

class ModelManager
{
    
    // class for database
    protected $bdd;
    
    public function __construct()
    {
        //connect to the database		  
        try {
             $this-> bdd = new PDO('mysql:host=127.0.0.1;dbname=Portfolio;charset=utf8','root');
            
             //todo: Mettre la base de données sur l'IDE
            //$this-> bdd = new PDO('mysql:host=home.3wa.io:3307;dbname=live-44_flaviafon_yoga;charset=utf8','flaviafon','7cbc02aeNzM0YWIyZTllOWI0YjE5ODE0MWJlNzA366c6f0c4');
        }

        catch (Exception $ex) 
         {
             // find the error on the database entry 
            echo $ex->getMessage();
         }

         finally
         {
            // find the error in the resquest
            $this-> bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         }
    }
            
    public function queryFetch($req,$params = [])
    {
        //prepare
        $query = $this -> bdd -> prepare($req);
        //execute 
        $query -> execute($params);
        //fetch
        return $query -> fetch(PDO::FETCH_ASSOC);
    }
    
    
    public function queryFetchAll($req,$params = [])
    {
        //prepare
        $query = $this -> bdd -> prepare($req);
        //execute 
        $query -> execute($params);
        //fetch
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function query($req,$params = [])
    {
        //prepare
        $query = $this -> bdd -> prepare($req);
        //execute 
        $query -> execute($params);
        // error information
        var_dump($query-> errorInfo());
    }
    
    
    public function getLastId()
    {
        return $this -> bdd ->lastInsertId();
    }  
}
        
        