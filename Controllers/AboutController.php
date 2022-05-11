<?php

class AboutController extends FrontController
{
    public function display()
    {
        //get tags from Cloud for tag cloud
        $modelCloud = new CloudModel();
        $cloud = $modelCloud-> getCloud();

        //get information for IT job and training 
        $model = new ITModel();
        $aboutIt = $model -> getIt();

        //get information for Certifications
        $modelCertifs = new CertificationsModel();
        $certifications = $modelCertifs-> getCertifs();

        //get information for Language IT
        $modelLanguageIT = new LanguagesItModel();
        $aboutPictures = $modelLanguageIT -> getLanguagesIt();
        
        //get information for Language
        $modelLanguage = new LanguagesModel();
        $aboutLanguages = $modelLanguage -> getLanguages(); 
        
        //get information for old job and training 
        $modelOld = new RHModel();
        $aboutOld = $modelOld -> getOld();
        
        // templates page
        $template = "about.phtml";
        include "Views/layout.phtml";
    }

}