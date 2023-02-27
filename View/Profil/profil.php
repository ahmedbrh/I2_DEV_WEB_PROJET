<html>
  <head>
    <!--liens css -->
    <!-- css de l'acceuil -->
    <link
      href="Public/Accueil/css/Accueil_content.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="Public/Profil/css/profil.css"
      rel="stylesheet"
      type="text/css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="Public/Accueil/scripts/lightslider.js"></script>
    <link rel="stylesheet" href="Public/Accueil/css/lightslider.css" />
  </head>
  <body>
    
<button type="button" class="collapsible">Mes favoris</button>
    <div class="content">
      <p></p>
    </div>
    
<button type="button" class="collapsible">Ajouter un ami</button>
<div class="content">
  
  <form class="form-horizontal" id="Formulaire-demande-ami" method="post">
     <div class ="form-group">
          <label class="control-label col-sm-2"> Email:</label>
              <div class ="col-sm-8">
                    <input  type="email" class= "form-control" id="email"                            name="email">
              </div>
      </div>

<div class ="form-group">
    <div class ="col-sm-offset-2 col-sm-10">
        <button type ="submit" name="demande" class="btn btn-default">Envoyer la demande</button>
    </div>
</div>

</form>
</div>
    
<button type="button" class="collapsible">Favoris de mes amis</button>
<div class="content">
  <p></p>
</div>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
    
</body>
</html>
