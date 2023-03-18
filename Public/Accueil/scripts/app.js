
//ISBN : International Standard Book Number  
//api utilisé  :https://developer.nytimes.com/docs/books-product/1/overview 

// la cle|| ! env 
const key = "n6RRK59oCG9F0PA8u0fG2vNvEuILEE9Z";
const api_url = `https://api.nytimes.com/svc/books/v3/lists/current/hardcover-fiction.json?api-key=${key}`;

//methode fetch 
const getBooks = async () => {
  // fetcher l'api 
  const response = await fetch(api_url);
// to make fetch call (promise call )
  const data = await response.json();
  return data; //api
};
 
 

// popup  
// fonction handleClick pour le popup
// un Livre a pour attributs: image, title, ISBN,desc , author 
// la fonction handleclick s'éxecute quand on clique sur un livre en lui passant plusieurs parametres 

var currentIntervalId = "";
var spinnerLoadingHtml = '<div id="loading-replies"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>'

// function pour render tous les livres section  TOPSellerbooks


async function renderBooks() {
  let y = await getBooks();
  let html = "";
  let books=[]

 // Playing with data api 
 // ForEach : pour selection tous l'api 
  y.results.books.forEach(api => {
    ulElement = $('<ul  class="books-ln" class="cs-hidden"><li><div class="latest_box"> <div class="latest_b_img"></div><div class="latest_b_text"></div></div></li></ul>')
    
    titleElement = $('<strong></strong>');
    if(api.title.length>15){
      titleElement.text(api.title.substring(0,15)+"...");
    }else{
      titleElement.text(api.title);
    }
    
    authorElement = $('<p class="authors"></p>');

     if(api.author.length>17){
       authorElement.text(api.author.substring(0,17)+"...");
    }else{
      authorElement.text(api.author);
    }

    imgElement = $('<img></img>');
    imgElement.attr("src",api.book_image);
    imgElement.attr("alt",api.title);
    imgElement.click(function() {
      openPopup(api.isbns[0].isbn13,api.title,api.book_image,api.author,api.description,api.buy_links[0].url,api.buy_links[1].url)
    });
    ulElement.find(".latest_b_img").append(imgElement);
    ulElement.find(".latest_b_text").append(titleElement);
  ulElement.find(".latest_b_text").append(authorElement);
    
  $('.books_container').append(ulElement);
  });

}


//DOMContentLoaded est émis lorsque le document HTML initial a été complètement chargé et analysé sans attendre que le css , images etc  aient terminé de charger.
document.addEventListener("DOMContentLoaded",  ()=> {
  renderBooks(); 
  
});
