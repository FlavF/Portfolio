<?php

class PhotographyController extends FrontController
{
    public function display()
    {
        //table photo tag
        $model = new PhotographiesModel();
        $tags = $model-> getTags();

        //table photo 
        $model = new PhotographiesModel();
        $photos = $model-> getPhotos();

        //table photo 
        $model = new PhotographiesModel();
        $categories = $model-> getPhotosTags();

        // templates page
        $template = "photography.phtml";
        include "Views/layout.phtml";
    }

}