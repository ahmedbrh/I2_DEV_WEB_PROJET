<?php
class ProfilController {
  function __construct(){
    $titre="profil";
  }

  function renderProfil(){
    	include "View/Profil/profil.php";
  }

  function getFavoris(){
    echo "bonjour";
  }

  function getFavorisAmis(){
    echo "bonjour";
  }

  
}

?>

