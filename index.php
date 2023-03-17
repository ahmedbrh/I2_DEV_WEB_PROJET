<?php session_start(); ?>
<!DOCTYPE html>
<html style="height:100%">
	<head>

  <!-- font awesome  cdn icons  -->
   <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bibliolib</title>

  <!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<!-- Source  -->
<script src="Public/Accueil/scripts/JQuery3.3.1.js"></script>


	</head>
	<body style='min-height:100vh'>

		<header>
    <!-- le header reste fixe -->
		<?php  include "header.php"  ?>
     <!-- le header reste fixe -->
		</header>
	 <!-- le main change en fonction du lien -->
		<main >
    <!-- on assigne le la variable globale page à la variable route pour effectuer
    un switch case et appeler la fonction du controlleur, en fonction du lien
      -->
		<?php
  $route = "accueil";
  if(isset($_SERVER["REQUEST_METHOD"])){
    if(isset($_GET["page"])){
		  $route = $_GET["page"];
	   }

  }
	
	switch($route)
	{
		case "accueil" : 
			require_once("Controller/homeController.php") ;
			$homeController = new HomeController();
      $homeController->renderHome();
			break;
    case "profil":
       require_once("Controller/profilController.php");
      $profilController = new ProfilController();
      $profilController->renderProfil();
      break;
		case "logging" :
      if (isset($_SESSION["user"]) && !isset($_POST["deconnexion"])){
        require_once( "Controller/userController.php");
			 afficheAccueil();
      }else{
        require_once( "Controller/loggingController.php");
  			$logController = new LoggingController();
        $logController->renderLogging();
      }
			break;
		case "genre":
			require_once( "Controller/genreController.php");
			$genreController = new GenreController();
      $genreController->renderGenre();
      break;
    case "aboutus":
			require_once( "Controller/userController.php");
			afficheAboutus();
      break;
	  case "search":
		require_once(  "Controller/userController.php");
		 afficherSearch();
		 break;
	}
	?>
 <footer>
		<?php  include "footer.php"  ?>
		</footer>
		</main>
    	 <!-- le main change en fonction du lien -->

        <!-- le footer reste fixe -->
		
     <!-- le footer reste fixe -->

<!--   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

	</body>
  
</html>

	
