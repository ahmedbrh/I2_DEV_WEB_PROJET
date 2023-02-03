<!DOCTYPE html>
<html>
	<head>

  <!-- font awesome  cdn icons  -->
   <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Bibliolib</title>

  <!-- bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- Source  -->
<script src="Public/Accueil/scripts/JQuery3.3.1.js"></script>


	</head>
	<body>
		<header>
    <!-- le header reste fixe -->
		<?php  include "header.php"  ?>
     <!-- le header reste fixe -->
		</header>
	 <!-- le main change en fonction du lien -->
		<main>
    <!-- on assigne le la variable globale page à la variable route pour effectuer
    un switch case et appeler la fonction du controlleur, en fonction du lien
      -->
		<?php
	if(isset($_GET["page"])){
		$route = $_GET["page"];
	}
	else
		$route = "accueil";
	switch($route)
	{
		case "accueil" : 
			include "Controller/userController.php";
			afficheAccueil();
			break;
		case "signIn" : 
			include "Controller/userController.php";
			afficheLogin();
			break;
		case "genre":
			include "Controller/userController.php";
			afficheGenre();
      break;
    case "aboutus":
			include "Controller/userController.php";
			afficheAboutus();
      break;
	  case "search":
		include  "Controller/userController.php";
		 afficherSearch();
		 
		 break;
	}
	?>
		</main>
    	 <!-- le main change en fonction du lien -->

        <!-- le footer reste fixe -->
		<footer>
		<?php  include "footer.php"  ?>
		</footer>
     <!-- le footer reste fixe -->

<!--   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

	</body>
</html>

	
