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
      <div class="livres">
      <p>
          <?php 
         require_once("Model/profil.php");  
          
          $favoris= new ArrayObject();
          $pc = new Profil();
          $test=$pc->getFavoris("Anatole");
          foreach($test as $isbn ){
            $favoris->append($isbn["lvr_isbn"]);
          }

          foreach($favoris as $isbn ){
    $json = file_get_contents('https://www.googleapis.com/books/v1/volumes?q=isbn:'.$isbn);

$data = json_decode($json,true);

$titre=$data['items'][0]['volumeInfo']['title'];
$image_link=$data['items'][0]['volumeInfo']['imageLinks']['smallThumbnail'];

            echo "<div class='livre'>".$titre."<br>";
            echo "<img src=".$image_link." alt='premiere de couverture'></div>";
          }
          ?>
      </p>
      </div>
    </div>
    
<button type="button" class="collapsible">Ajouter un ami</button>
<div class="content">
  
  <form class="form-horizontal" id="Formulaire-demande-ami" method="post">
     <div class ="form-group">
          <label class="control-label col-sm-2"> Email:</label>
              <div class ="col-sm-8">
                    <input  type="email"  placeholder="Entrez l'email de l'utilisateur recherché" class= "form-control" id="email"                            name="email">
              </div>
      </div>

<div class ="form-group">
    <div class ="col-sm-offset-2 col-sm-10">
        <input type ="submit" name="demande" value="Envoyer la demande" class="btn-default">
    </div>
</div>

</form>
</div>
    
<button type="button" class="collapsible">Favoris de mes amis</button>
<div class="content">
  <p>

    <?php        
    
          //$pc->getFavorisAmis();
    
    ?>
  </p>
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
