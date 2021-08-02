<?php

class OpinionController extends FrontController
{
    public function display()
    {
        $message = "Vous pouvez voter.";
        
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
        
        // Check IP
        $ipAdress = $this->getIp();
        $model = new RatingModel();
        $starIp = $model -> getStarAllIp($ipAdress);
                //no ip in the database go vote 
        if(empty($starIp)){
            $message = "Vous pouvez voter.";
        }
        //ip in the database you can't vote
        else {
            $message = "Vous avez déjà voté. Merci pour votre vote.";
        }
        
        // templates page
        $template = "opinion.phtml";
        include "Views/layout.phtml";
    }
    
    function getIp(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    
    function addStars(){
        if($message === "Vous avez déjà voté. Merci pour votre vote."){
            die;
        }
        else{
            
            $ip = $this->getIp();
            
            //from the result we add the starnumber and the rating
            switch($_POST['rating']){
                case'1':
                    $model = new RatingModel();
                    $model -> addStar(
                        (int)1, 
                        (int)0,
                        (int)0,
                        (int)0,
                        (int)0,
                        (int) $_POST['rating'],
                        (string) $ip);
                        break;
                        case'2':    
                            $model = new RatingModel();
                            $model -> addStar(
                                (int)0, 
                                (int)1,
                                (int)0,
                                (int)0,
                                (int)0,
                                (int) $_POST['rating'],
                                (string) $ip);
                                break;
                                case'3':    
                                    $model = new RatingModel();
                                    $model -> addStar(
                                        (int)0, 
                                        (int)0,
                                        (int)1,
                                        (int)0,
                                        (int)0,
                                        (int) $_POST['rating'],
                                        (string) $ip);
                                        break;
                                        case'4':    
                                            $model = new RatingModel();
                                            $model -> addStar(
                                                (int)0, 
                                                (int)0,
                                                (int)0,
                                                (int)1,
                                                (int)0,
                                                (int) $_POST['rating'],
                                                (string) $ip);
                                                break;
                                                case'5':    
                                                    $model = new RatingModel();
                                                    $model -> addStar(
                                                        (int)0, 
                                                        (int)0,
                                                        (int)0,
                                                        (int)0,
                                                        (int)1,
                                                        (int) $_POST['rating'],
                                                        (string) $ip);
                                                        break;
                                                    }
                                                    
                                                    //reload page
                                                    header('location:index.php?page=opinion');
                                                }
                                            }                        
                                       
                                        }