<?php

class OpinionController extends FrontController
{
    public function display()
    {
        // nbr star 1
        $model = new RatingModel();
        $star1 = $model -> getStar1();

        // nbr star 2
        $model = new RatingModel();
        $star2 = $model -> getStar2();

        // nbr star 3
        $model = new RatingModel();
        $star3 = $model -> getStar3();

        // nbr star 4
        $model = new RatingModel();
        $star4 = $model -> getStar4();

        // nbr star 5
        $model = new RatingModel();
        $star5 = $model -> getStar5();

        // sum all stars 
        $model = new RatingModel();
        $starSum = $model -> getStarSum();

         // average all stars 
        $model = new RatingModel();
        $starAverage = $model -> getStarAverage();


        // templates page
        $template = "opinion.phtml";
        include "Views/layout.phtml";
    }

}