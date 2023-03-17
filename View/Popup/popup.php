<head>
  <link href="Public/Popup/css/style.css" rel="stylesheet">
</head>

<body>
<div  class="overlay"  >
         
         </div>
	<div id="popup_container">
  <!--Bouton fermer -->
    <div id="popup_header">
  	
      <!--Bouton fermer -->
    <!--Titre du Livre -->

		<h2 id="titlePop"></h2>
      <button type="button" class="btn-close close" aria-label="Close"></button>
    </div>
    <!--Titre du Livre -->
      
      <div id="midPop">
      <!--Image du livre -->
  <img id="imgPop" />


  <!--Image du livre -->


<!-- bloc information livre;auteur,description lien....-->
<div id="informations">
 
  <input id="isbn" style="display: none;" name="isbn"></input> 
<ul>
<li id="authors"></li>
<li id="description"></li>
<li id="links"> </li>
<li id="links2"></li>
    <?php
    if(isset($_SESSION["user"])){
       echo "<input hidden type='checkbox' id='favorite'><label for='favorite'>&#9825;</label>";

    }

  ?>
      
<ul>
<div id="favorite-alerts">
  <div class="alert alert-light" id="success-favorites-add">
    Book have been <strong>added</strong> to your favorites.
  </div>
    <div class="alert alert-light" id="success-favorites-remove">
    Book have been <strong>removed</strong> from your favorites.
  </div>
</div>
</div>
   
<br>

  <!--Image du livre -->
 <div id="commentaryArea" >

<!-- affichage des commentaires Sql -->


 </div>

</div>



	

     <!--Champ des commentaires -->


       <!--Champ des commentaires -->


<!--Formulaire envoi commentaire -->
  <?php
if(isset($_SESSION["user"])){  
echo
    '<div class="container">
<form id="replyForm" method="post">
 <div class="form-group"> 
    <label for="comment">Add a comment:</label>
    <textarea  id="commentaire" !name="commentaire" class="form-control" id="comment" rows="3"   style="resize: none;"></textarea>
  </div>
<div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label></div>
<div><button type="submit" name="commenter" class="btn btn-dark">Submit a comment</button></div>

<input id="valuePage" style="display:none" name="valuePage" value="'.$_GET['page'].'"></input>
</form>


</div>';
}else{
  echo "<p style='text-align:center;font-size:20px;margin-top:30px;'><a href='/index.php?page=logging'>Log in</a> to reply</p>";
}

?>
</div>

 <!--Formulaire envoi comentaire -->
 <script src="Public/Popup/scripts/script.js"></script>

 </body>