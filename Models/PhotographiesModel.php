<?php

class PhotographiesModel extends ModelManager
{
    //Get picture name and info
     public function getPhotos()
    {
        $req = "SELECT id_photo, name, src, alt 
                FROM Photographies
                ORDER BY visual ASC";

        return $this -> queryFetchAll($req);
    }

     //Get tag name and info
      public function getTags()
    {
        $req = "SELECT id_tag, name
        FROM Photographies_tags
        ORDER BY name";

        return $this -> queryFetchAll($req);
    }
   
    //show association between tags and pics
    public function getPhotosTags()
    {
        $req = "SELECT DISTINCT Photographies.name as photo, Photographies_tags.name as tag
        FROM Photographies_categories
        LEFT JOIN Photographies
         ON Photographies.id_photo = Photographies_categories.id_photo
        LEFT JOIN Photographies_tags
          ON Photographies_tags.id_tag = Photographies_categories.id_tag";

        return $this -> queryFetchAll($req);
    }


}