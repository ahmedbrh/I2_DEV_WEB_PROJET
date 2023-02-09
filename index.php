<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>library bib</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- Source  -->
<script src="Public/Accueil/js/JQuery3.3.1.js"></script>


	</head>
	<body>
		<header>
		<?php  include "header.php"  ?>
		</header>
	
		<main>
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
    
		<footer>
		<?php  include "footer.php"  ?>
		</footer>
<!--   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

	</body>
</html>

	
