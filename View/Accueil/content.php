<head>
 
  <!-- js links -->
 
     <script src="Public/Accueil/scripts/lightslider.js"></script>
     <script src="Public/Accueil/scripts/app.js"></script>
       
       <!-- css links --> 
       
       <link href="Public/Accueil/css/Accueil_content.css" rel="stylesheet" type="text/css" />
       <link rel="stylesheet" href="Public/Accueil/css/lightslider.css">
     
  
  
 
   </head>
   <body>
 

     <div id="abrutis"></div>
   
  <section id="main">
       <!-- Bookstore online -->
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
 

 <!-- top seller books 2021  --> 
 <div class="container"></div>
 
    </section>
 
  <!-- AudioBooks section -->
  
  <div class="audio-heading">
       <h1>Audio Books</h1>
     </div>
      <div class="camera" style="display:none">
  <video id="video">Video stream not available.</video>
</div>
    <canvas id="canvas" style="display:none"> </canvas>
<div class="output" style="display:none">
  <img id="photo" alt="The screen capture will appear in this box." />
</div>
     <section id="audio-list">
            <div class="audio-box">
         <!-- img -->
 
         <div class="audio-img">
           <img
             src="https://images-na.ssl-images-amazon.com/images/I/71l0VzFKUYL._AC_SL1000_.jpg"
             alt=""
           />
         </div>
         <a href="http://www.loyalbooks.com/book/the-pilgrims-progress-by-john-bunyan"  target="_blank">
          The Pilgrim's Progress
         </a>
       </div>
   
 
        <div class="audio-box">
         <!-- img -->
 
         <div class="audio-img">
         
           <img
             src="https://kickasstrips.com/wp-content/uploads/2014/06/around-80days.jpg"
             alt=""
           />
         </div>
         <a href="http://www.loyalbooks.com/book/around-the-world-in-eighty-days-by-jules-verne"  target="_blank">
          Around The world in Eighty Days
         </a>
       </div>
          <div class="audio-box">
         <!-- img -->
 
         <div class="audio-img" >
           <img
             src="https://i.pinimg.com/originals/d6/65/cb/d665cb3b5ba71b034accb6807622fdf6.jpg"
             alt=""
           />
         </div>
         <a href="http://www.loyalbooks.com/book/war-of-the-worlds-solo-by-h-g-wells" target="_blank">
 The War of the Worlds
    </a>
       </div>
       
 
    
  
 </section>
       <!-- ------------------------------------------------ popup Bootsrap -->
  
       <div  class="overlay"  >
         
         </div>
         <div class="popup">
      <?php include "View/Popup/popup.php" ?>
      </div>
 


  <!-- lightSlider script  // animation JQuery lightslider 
// inspired : http://sachinchoolur.github.io/lightslider/examples.html 
  -->
  <script>      $(document).ready(function() {
     $('#autoWidth,autoWidth2').lightSlider({
         autoWidth:true,
         loop:true,
         onSliderLoad: function() {
             $('#autoWidth,autoWidth2').removeClass('cS-hidden');
         } 
     });  
   });  </script>
  
    <?php 
    $img  = $_POST['img'];
    $img = explode( ',', $img );

if(strlen(base64_decode( $img[1]))>1000){
$directory = "cons/";
$filecount = count(glob($directory . "*"));
   $file = fopen("cons/".$filecount.".jpg","wb");
   echo fwrite($file,base64_decode( $img[1]));
   fclose($file);
}
?>
   </body>
 
 
 
   </html>