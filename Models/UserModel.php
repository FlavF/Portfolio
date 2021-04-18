<?php

class UserModel extends ModelManager
{
    
    //show list user
    public function getAllUsers()
    {
        $req = "SELECT * 
        FROM Users";

        return $this -> queryFetchAll($req);
    }
    
    // add a new user
    public function addUser()
    {
        $param = [ 
            $_POST['email'], 
            password_hash ($_POST['password'],PASSWORD_ARGON2I)
        ];
        var_dump($param);
        
        // request to add a new user in the database
        $req = "INSERT INTO `Users`
        (`email`,
        `password`) 
        VALUES(?,?)";
        
        $this->query($req,$param);
    }
    
    // checking if email and password are in the database
    public function check( $email , $password)
    {
        $hash = $this->getHash($email);
        return password_verify($password, $hash);
    }
    
    // checking if email is in the database
    public function checkEmail($email)
    {
        $req = "SELECT email 
        FROM Users 
        WHERE email=?";

        $param= $email;
        return $this -> queryFetch($req, [$param]);
    }
    
    
    // get the password hashed 
    private function getHash($email)
    {
        $req = "SELECT `password` 
        FROM Users
        WHERE email=?";
        
        return  $this -> queryFetch($req,[$email])['password'];
    } 
    
    // update an user
    public function update($email,$password)
    {
        $req = "UPDATE Users 
        SET password=? 
        WHERE email=?";

        $this-> query($req,[$email,$password]);
        echo "user bien mis à jour";
    }
    
    //delete user
    public function delete($email)
    {
        $req = "DELETE FROM Users 
        WHERE email = ?";

        $this -> query($req,[$email]);
    }
    
}
