
<?php
	include "./Model/DataBase.php";
	
	function afficheAccueil()
	{	
		$titre = "Accueil";
        include "View/Accueil/content.php"; 
    } 
function afficheLogin(){
    
		$titre = "SignIn";
        include "View/SignIn/content.php"; 
    }
function afficheGenre(){
	$titre="genre";
	include "View/Genre/Genre.php";
}

function afficherSearch(){
	$titre="search";
	include  "View/Search/search.php";
  }
function afficheAboutus(){
	$titre="about";
	include "View/AboutUs/aboutus.php";
}

?>
