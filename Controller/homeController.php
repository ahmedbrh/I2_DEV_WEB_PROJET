<?php
class HomeController {
  function __construct(){
    $titre = "Home";
  }

  function renderHome(){
    include "View/Accueil/content.php"; 
  }

}

