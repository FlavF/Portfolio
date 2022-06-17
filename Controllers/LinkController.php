<?php

class LinkController extends FrontController
{
    public function display()
    {
        // Links table
        $model = new LinkModel();
        $links = $model -> getLinksTags();

        // templates page
        $template = "link.phtml";
        include "Views/layout.phtml";
    }


    public function add()
  {
    $level = 0;
    //todo:m'envoyer une alerte nouveau lien

    //var_dump($_POST);
    // get the elements from the table
    $model = new LinkModel();
    $addLink = $model -> addLink(
      (string) $_POST['link'], 
      (string) $_POST['url'],
      (string) $_POST['title'],
      (int) $_POST['id_tag'],
      (int) $level);

      $answer="Je vous remercie pour votre suggestion de lien.
      Si le lien est acceptée, elle sera visible sur cette page prochainement.";
      
    //reload page
    header("location:index.php?page=link");
  }

}