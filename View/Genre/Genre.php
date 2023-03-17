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
      href="Public/Genre/css/Genre_content.css"
      rel="stylesheet"
      type="text/css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="Public/Accueil/scripts/lightslider.js"></script>
    <link rel="stylesheet" href="Public/Accueil/css/lightslider.css" />
  </head>
  <body>
    <!-- section itbooks -->
    <h2 class="latest_heading">IT-BOOKS</h2>

    <div id="IT_books"></div>

    <!--  section romance -->
    <section class="latest">
      <h2 class="latest_heading">Romance</h2>

      <div id="romance">
  
      </div>
    </section>

    <!-- sci-fiction -->
    <section class="latest">
      <!-- section sci-fiction -->
      <h2 class="latest_heading">Sci-Fiction</h2>

      <div id="scifiction">
       
      </div>
    </section>
    <!-- thriller -->
    <section class="latest">
      <h2 class="latest_heading">Thriller</h2>

      <div id="thriller"></div>
    </section>

<!--  Manga ---> 
  </section>
    <!-- thriller -->
    <section class="latest">
      <h2 class="latest_heading">Manga</h2>

      <div id="manga"></div>
    </section>


    
     <div class="popup">
      <?php include "Controller/popupController.php";
      $popupController = new Popupcontroller();
      $popupController->renderPopup();
        ?>
      </div>
  </body>

  <!-- Js Genre link -->
  <script src="Public/Genre/scripts/script.js"></script>
</html>
