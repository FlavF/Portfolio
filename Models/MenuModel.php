<?php

class MenuModel extends ModelManager
{
    
    //show list Menu
    public function getMenu()
    {
        $req = "SELECT Menu.id_menu as id_menu, name, menu_1, menu_2, menu_3,  
        Links.id_link as id_link, url,
        Pictures.id_picture as id_picture, src
        FROM Menu 
        INNER JOIN Links ON Links.id_link= Menu.id_link 
        LEFT JOIN Pictures ON Pictures.id_picture= Menu.id_picture
        ORDER BY menu_1";
        return $this -> queryFetchAll($req);
    }

    // show list Menu for nav header
    public function getMenuHeader()
    {
        $req = "SELECT Menu.id_menu, name, menu_1, Links.id_link, link, url, Links.alt, Links.target as target
        FROM Menu 
        INNER JOIN Links ON Links.id_link= Menu.id_link 
        ORDER BY menu_1";
        return $this -> queryFetchAll($req);
    }

    // show list Menu for nav footer
    public function getMenuFooter()
    {
        $req = "SELECT Menu.id_menu, name, menu_2, Links.id_link, link, url, Links.alt as alt , icon 
        FROM Menu 
        INNER JOIN Links ON Links.id_link= Menu.id_link 
        WHERE menu_2>0
        ORDER BY menu_2";
        return $this -> queryFetchAll($req);
    }

    // show list Menu for page home
    public function getMenuHome()
    {
        $req = "SELECT Menu.id_menu, name, menu_3, 
        Links.id_link, link, url, Links.alt as link_alt, Links.target as target, icon, 
        Pictures.id_picture as id_picture, picture, src, Pictures.alt as picture_alt
        FROM Menu 
        INNER JOIN Links ON Links.id_link= Menu.id_link 
        INNER JOIN Pictures ON Pictures.id_picture= Menu.id_picture 
        WHERE menu_3>0
        ORDER BY menu_3";
        return $this -> queryFetchAll($req);
    }


    // update list Menu
    public function updateMenu($menu1,$menu2,$menu3,$nom,$id_picture,$id_link,$id)
    {
        $req = "UPDATE Menu 
        SET  menu_1=?, menu_2=?, menu_3=?, name=?, id_picture=?, id_link=?
        WHERE id_menu=?";

        $this -> query($req,[$menu1,$menu2,$menu3,$nom,$id_picture,$id_link,$id]);
    }

     // add a page in list Menu
    public function addMenu($menu1,$menu2,$menu3,$nom,$id_picture,$id_link)
    {
       $req = "INSERT INTO Menu(menu_1, menu_2, menu_3, name, id_picture, id_link) 
       VALUES(?,?,?,?,?,?)";

       $this-> query($req,[$menu1,$menu2,$menu3,$nom,$id_picture,$id_link]);
    }
    
    // delete a page in List Menu
     public  function deleteMenu($id)
    {
        $req = "DELETE FROM Menu 
        WHERE id_menu =?";

        $this -> query($req,[$id]);
    }

}