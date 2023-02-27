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
<?php 
if ( !isset( $_SESSION['user'] )) {
  echo '<li><a href="?page=logging">Sign in </a></li>';
  }
?>

</ul>

<div class="username">

        <?php 
        if(isset($_SESSION['user'])) {
          
echo 
  
"
<div class='header_connect' style='display:flex; align-items:center;'>
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
</html>

