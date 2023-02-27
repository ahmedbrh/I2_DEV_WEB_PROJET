<head>
  <link href="Public/Popup/css/style.css" rel="stylesheet">
</head>

<body>

	<div id="popup_container">
  <!--Bouton fermer -->
  	<button class="close" >&times;</button>
      <!--Bouton fermer -->
    <!--Titre du Livre -->

		<h2 id="titlePop"></h2>
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
<ul>
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
<div class="container">
<form id="replyForm" method="post">
 <div class="form-group"> 
    <label for="comment">Add a comment:</label>
    <textarea  id="commentaire" !name="commentaire" class="form-control" id="comment" rows="3"   style="resize: none;"></textarea>
  </div>
<button type="submit" name="commenter" class="btn btn-primary">Submit a comment</button>

<input id="valuePage" style="display:none" name="valuePage" value="<?php echo $_GET['page'] ?>"></input>
</form>
</div>

</div>

 <!--Formulaire envoi comentaire -->
 <script src="Public/Popup/scripts/script.js"></script>

 </body>