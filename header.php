<!DOCTYPE html>
<html>
	<head>
  <meta name="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="header.css" rel="stylesheet" type="text/css" />
  <link href="Public/Header/notif.css" rel="stylesheet" type="text/css" />
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
<?php 
if ( !isset( $_SESSION['user'] )) {
  echo '<li><a href="?page=logging">Sign in </a></li>';
  }
?>

</ul>

<div class="username">

        <?php
        if(isset($_SESSION['user'])) {
          require_once("Model/friend.php");
          $friendClasse = new Friend();
          $friend = $friendClasse->get_not_accepted_friend($_SESSION['user']);


       
echo 
  
"<div class='header_connect' style='display:flex; align-items:center;'>
<div id='notif_container'>
<div id='myDropdown' class='dropdown-content'>

  </div>
<svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-bell-fill' viewBox='0 0 16 16'>
  <path d='M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z'/>
</svg>
<svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-bell' viewBox='0 0 16 16'>
  <path d='M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z'/>
</svg></div>

 <a href='?page=profil'> <img class='profile_link' src='https://pbs.twimg.com/profile_images/911523367492161536/XDOQPjqf_400x400.jpg' style='border-radius:50%;' width='50px' height='50px' id='avatar'/></a>
  <span class='user_name'></br>".$_SESSION['user']."</span>
  </br>&nbsp&nbsp 
 <div> <form id='decform' method='post' ><input name='deconnexion' style='display:none' value='lol'><button type='submit' id='deconnexion' class='deconnex'>Se déconnecter<i style='font-size:20px; margin-left:5px;' class='fa fa-sign-out' aria-hidden='true'></i></button> </form>
 
</div>
</div>
";

        
        }
    

?>
   
      </div>

</nav>


</body>
<script>
  $("#decform").submit(function(event) {
    var ajaxRequest;
    $("#result").html('');
    var values = ($(this).serialize());
      console.log(values)
       ajaxRequest= $.ajax({
            url: "?page=logging",
            type: "post",
            data: values
        });


  })

</script>
  
      <script src="Public/Header/js/notif.js"></script>
</html>

