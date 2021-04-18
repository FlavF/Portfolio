<?php

class PageModel extends ModelManager
{
    
    //show all items 
    public function getPagesItems()
    {
        $req = "SELECT Pages.id_page as id_page,Pages.name as name, number,abstract,description_title,description,step_title, step,advice_title, advice, restriction_title, restriction, duration_title, duration, schedule_title, schedule, price, 
        Pages.id_menu as id_menu, Menu.name as menu,
        Pages.id_link as id_link, Links.url as url,Links.alt as alt_link,
        Pages.id_picture as id_picture,Pictures.src  as src, Pictures.alt as alt_picture
        FROM Pages
        INNER JOIN Menu ON Menu.id_menu=Pages.id_menu
        LEFT JOIN Links ON Links.id_link=Pages.id_link
        LEFT JOIN Pictures ON Pictures.id_picture=Pages.id_picture
        ORDER BY Pages.id_menu and number";
        return $this -> queryFetchAll($req);
    }
    
         //show items page Yoga
    public function getPageYoga()
    {
        $req = "SELECT Pages.id_page as id_page,Pages.name as name, number,abstract,description_title,description,step_title, step,advice_title, advice, restriction_title, restriction, duration_title, duration, schedule_title, schedule, price, 
        Pages.id_menu as id_menu, Menu.name as menu,
        Pages.id_link as id_link, Links.url as url,Links.alt as alt_link,
        Pages.id_picture as id_picture,Pictures.src  as src, Pictures.alt as alt_picture
        FROM Pages
        INNER JOIN Menu ON Menu.id_menu=Pages.id_menu
        LEFT JOIN Links ON Links.id_link=Pages.id_link
        LEFT JOIN Pictures ON Pictures.id_picture=Pages.id_picture
        WHERE Pages.id_menu = 9
        ORDER BY number";
        return $this -> queryFetchAll($req);
    }

    //show items page Massage
    public function getPageMassage()
    {
        $req = "SELECT Pages.id_page as id_page,Pages.name as name, number,abstract,description_title,description,step_title, step,advice_title, advice, restriction_title, restriction, duration_title, duration, schedule_title, schedule, price, 
        Pages.id_menu as id_menu, Menu.name as menu,
        Pages.id_link as id_link, Links.url as url,Links.alt as alt_link,
        Pages.id_picture as id_picture,Pictures.src  as src, Pictures.alt as alt_picture
        FROM Pages
        INNER JOIN Menu ON Menu.id_menu=Pages.id_menu
        LEFT JOIN Links ON Links.id_link=Pages.id_link
        LEFT JOIN Pictures ON Pictures.id_picture=Pages.id_picture
        WHERE Pages.id_menu = 10
        ORDER BY number";
        return $this -> queryFetchAll($req);
    }

    // -------
    // update a picture
    public function updatePageItem($name,$number,$abstract,$description_title,$description,$step_title,$step,$advice_title,$advice,$restriction_title,$restriction,$duration_title,$duration,$schedule_title, $schedule,$price,$id_menu,$id_picture,$id_link,$id)
    {
        $req = "UPDATE Pages
        SET  name=?, number=?, abstract=?, description_title=?,description=?, step_title=?, step, advice_title=?, advice=?, restriction_title=?, restriction=?, duration_title=?, duration=?, schedule_title=?, schedule=?, price=?, id_menu=?, id_picture=?, id_link=?
        WHERE id_page=?";

        $this -> query($req,[$name,$number,$abstract,$description_title,$description,$step_title,$step,$advice_title,$advice,$restriction_title,$restriction,$duration_title,$duration,$schedule_title,$schedule,$price,$id_menu,$id_picture,$id_link,$id]);
    }
    
    // add a picture
    public function addPageItem($name,$number,$abstract,$description_title,$description,$step_title,$step,$advice_title,$advice,$restriction_title,$restriction,$duration_title,$duration,$schedule_title, $schedule,$price,$id_menu,$id_picture,$id_link)
    {
        $req = "INSERT INTO Pages (name,number,abstract,description_title,description,step_title,step,advice_title,advice, restriction_title,restriction,duration_title, duration,schedule_title,schedule,id_menu,id_picture,id_link) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this-> query($req,[$name,$number,$abstract,$description_title,$description,$step_title,$step,$advice_title,$advice,$restriction_title,$restriction,$duration_title,$duration,$schedule_title, $schedule,$price,$id_menu,$id_picture,$id_link]);
    }
    
    // delete a picture
    public  function deletePageItem($id)
    {
        $req = "DELETE FROM Pages
        WHERE id_pages =?";
        $this -> query($req,[$id]);
    }
    
}