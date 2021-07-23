<?php

class CategoryModel extends ModelManager
{
    
    //show links list
    public function getCategories()
    {
        $req = "SELECT DISTINCT id_category, category
        FROM  Categories
        ORDER by number";

        return $this -> queryFetchAll($req);
    }
    





}