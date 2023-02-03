<head>
  <link href="Public/Popup/css/style.css" rel="stylesheet">
</head>

<body>

	<div id="popup_container">
  <!--Bouton fermer -->
  	<button class="close" >&times;</button>
      <!--Bouton fermer -->
    <!--Titre du Livre -->
    <form action="index.php?page=<?php echo $_GET['page'] ?>" method="POST">
    <input id="isbn2" style="display: none;" name="isbn2"></input> 
    <button type="submit" class="btn btn-secondary" id="rafraichir">rafraichir commentaires</button>
    </form>
		<h2 id="titlePop"></h2>
    <!--Titre du Livre -->
      
      <div id="midPop">
      <!--Image du livre -->
  <img id="imgPop" />
  <!--Image du livre -->


<!-- bloc information livre;auteur,description lien....-->
<div id="informations">
<ul>
<li id="authors"></li>
<li id="description"></li>
<li id="links"> </li>
<li id="links2"></li>
<ul>
</div>
<br>

  <!--Image du livre -->
 <div id="commentaryArea" >

<!-- requete Sql -->

<?php 
   if(isset($_POST["isbn2"])){
if(isset($_SESSION['utilisateur'])){
$nom=$_SESSION['utilisateur'];
$isbn=$_POST["isbn2"];
echo 'isbn:'.$isbn;
  $connect=mysqli_connect('localhost','root','','porjetweb');
 $query= mysqli_query($connect,"SELECT * FROM commentaire WHERE idlivre='$isbn'");
    
 
    while($row = mysqli_fetch_array($query)){
      echo "<div class='commentaire'>
                <div class='commentaireHeader'>
                      <div class='avatarandname'> 
                              <img src='https://pbs.twimg.com/profile_images/911523367492161536/XDOQPjqf_400x400.jpg' width='50px' height='50px' id='avatar'/>
                              <strong class='username'>".$row['nomUtilisateur']."</strong></br>
                      </div>
                      <time class='date'>22 Mars</time>
                </div><div class='commentaireContent'>
<p>".$row['message']."</p>

</div>
            </div>";
    } 
    
  }
  }

 ?>

 </div>

</div>



	

     <!--Champ des commentaires -->


       <!--Champ des commentaires -->


<!--Formulaire envoi commentaire -->
<div class="container">
<form action="Model/Ajoutcommentaire.php" action="#" method="POST">
 <div class="form-group"> 
    <label for="comment">Add a comment:</label>
    <textarea name="commentaire" class="form-control" id="comment" rows="3"   style="resize: none;"></textarea>
  </div>
<button type="submit" name="commenter" class="btn btn-primary">Submit a comment</button>
<input id="isbn" style="display: none;" name="isbn"></input> 
<input id="valuePage" style="display:none" name="valuePage" value="<?php echo $_GET['page'] ?>"></input>
</form>
</div>

</div>

 <!--Formulaire envoi comentaire -->
 <script src="Public/Popup/scripts/script.js"></script>

 </body>