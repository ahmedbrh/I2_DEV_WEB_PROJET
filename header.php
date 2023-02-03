<!DOCTYPE html>
<html>
	<head>
  <meta name="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="header.css" rel="stylesheet" type="text/css" />

  <!--font awsome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- google fonts -->  
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  </head>
	<body>

<!-- nav bar -->
		<nav>

			<a href="#" class="logo">
				<img src= "Public/Accueil/images/logobib.png"  > 
    
</a>

<!-- pour le responsive!--menu -->
<!-- menu--btn 
<input type="checkbox" class="menu-btn" id="menu-btn"/> 
-->
<div class="menu-bar">
<label class="menu-icon" for="menu-btn"> 

<span class="nav-icon"></span>
</label>

</div>
<!-- menu -->
<ul class="menu">
<li><a href="?page=accueil">Home</a></li>
<li><a href="?page=genre">Genres </a></li>
<li> <a href="?page=search">Search </a></li>
<li><a href="View/AboutUs/aboutus.php">About us </a></li>
<li><a href="?page=signIn">Sign in </a></li>

</ul>

<div class="username">

        <?php 
        session_start();
        if(isset($_SESSION['utilisateur'])) {
echo "<div style='display:flex; align-items:center;'><img src='https://pbs.twimg.com/profile_images/911523367492161536/XDOQPjqf_400x400.jpg' style='border-radius:50%;' width='50px' height='50px' id='avatar'/><h3 style='font-weight:100;'>Welcome </h3><h2 style='font-size:25px;'>".$_SESSION['utilisateur']."</h2></br>&nbsp&nbsp <a class='deconnex' href='Model/deconnexion.php'>Se déconnecter</a> <i style='font-size:25px; color:#E54A4A; margin-left:5px;' class='fa fa-sign-out' aria-hidden='true'></i></div>";
}

?>
   
      </div>

</nav>


</body>
</html>

