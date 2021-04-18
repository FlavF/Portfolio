<?php

class PictureModel extends ModelManager
{
    
    //show all pictures
    public function getPictures()
    {
        $req = "SELECT id_picture, picture, src, alt
        FROM  Pictures
        ORDER BY picture";
        return $this -> queryFetchAll($req);
    }
    
    // update a picture
    public function updatePicture($picture,$src,$alt,$id)
    {
        $req = "UPDATE Pictures
        SET  picture= ?, src=?, alt=?
        WHERE id_picture=?";
        $this -> query($req,[$picture,$src,$alt,$id]);
    }

      // add a picture
    public function addPicture($picture,$src,$alt)
    {
       $req = "INSERT INTO Pictures (picture, src, alt) 
       VALUES(?,?,?)";
       $this-> query($req,[$picture,$src,$alt]);
    }
    
    // delete a picture
     public  function deletePicture($id)
    {
        $req = "DELETE FROM Pictures 
        WHERE id_picture =?";
        $this -> query($req,[$id]);
    }
}