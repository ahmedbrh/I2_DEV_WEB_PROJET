
  <head>
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

  <link rel="preconnect" href="https://fonts.gstatic.com" />
   <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap"
      rel="stylesheet"
    />

    <script src="Public/Accueil/js/lightslider.js"></script>
    <script src="Public/Accueil/scripts/app.js"></script>
    	<link href="Public/Accueil/css/Accueil_content.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="Public/Accueil/css/lightslider.css">
    
 
 

  </head>
  <body>

 
 <section id="main">
      <!-- APP -->
      <h1 class="showcase_heading" >Bookstore Online</h1>
   
<ul id="autoWidth" class="cs-hidden">
      <!-- Items -->
  <li class="item">
  <div class="showcase_box">
   <a href="https://openlibrary.org/" target="_blank">
              <img
                src="Public/Accueil/images/6c86905bf64a9e7298313be8153a70ea.png"
                alt="openlibrary"
                
              />
            </a>
          </div>
        </li>

   <li class="item">
          <!-- Amazon -->
          <div class="showcase_box">
            <a
              href="https://www.amazon.com/books-used-books-textbooks/b?ie=UTF8&node=283155"
              target="_blank"
            >
              <img src="Public/Accueil/images/amazon_logo.jpg" alt="amazon" class="size" />
            </a>
          </div>
        </li>
   <li class="item">
          <!-- fnac -->
          <div class="showcase_box">
            <a href="https://www.fnac.com/e59444/Books" target="_blank">
              <img src="Public/Accueil/images/logo-fnac.png" alt="fnac" />
            </a>
          </div>
        </li>
            <li class="item">
          <!-- googlebooks -->
          <div class="showcase_box">
            <a
              href="https://books.google.fr/"
              target="_blank"
            >
              <img
                src="Public/Accueil/images/play-books-dark-theme-cover.png"
                alt="google"
                class="size"
              />
            </a>
          </div>
        </li>
         </ul>
            </section>

  <section id="latest"> 
         <h2 class="latest_heading">TOP SELLERS BOOKS 2021</h2>

<div class="container"></div>

             </section>

 <div class="trend-heading">
      <h1>News</h1>
    </div>
    <section id="trend-list">
      <div class="trend-box">
        <!-- img -->

        <div class="trend-img" >
          <img
            src="https://storage.googleapis.com/du-prd/books/images/9780778311010.jpg"
            alt=""
          />
        </div>
        <a href="#">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit.
        </a>
      </div>
       <div class="trend-box">
        <!-- img -->

        <div class="trend-img">
          <img
            src="https://storage.googleapis.com/du-prd/books/images/9780778311010.jpg"
            alt=""
          />
        </div>
        <a href="#">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit.
        </a>
      </div>
       <div class="trend-box">
        <!-- img -->

        <div class="trend-img">
          <img
            src="https://storage.googleapis.com/du-prd/books/images/9780778311010.jpg"
            alt=""
          />
        </div>
        <a href="#">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit.
        </a>
      </div>
     
        <!-- img -->

   
 
</section>
      <!-- ------------------------------------------------ popup  -->
 
      <div  class="overlay"  >
        
          <?php include "View/Popup/popup.php" ?>
        </div>
     

 <!-- slider script -->
 <script>      $(document).ready(function() {
    $('#autoWidth,autoWidth2').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth,autoWidth2').removeClass('cS-hidden');
        } 
    });  
  });  </script>
 

  </body>



  </html>