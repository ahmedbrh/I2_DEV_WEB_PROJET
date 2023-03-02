
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
function handleclick(isbn,title,img,auth,desc,link,link2){
var popupTitle=document.getElementById('titlePop');
var popupImage=document.getElementById('imgPop')
var overlay=document.getElementsByClassName('overlay')[0]
var popup=document.getElementsByClassName('popup')[0]
var description=$('#description');
var author=$('#authors');
var links=document.getElementById('links');
var links2=document.getElementById('links2');
var idlivre=document.getElementById('isbn');
var commentaires=document.getElementById('commentaryArea');
  commentaires.innerHTML=spinnerLoadingHtml;
  let closeBtn = document.getElementsByClassName('close')[0]
  closeBtn.addEventListener("click",(e)=>{
    clearInterval(currentIntervalId);
});
  overlay.addEventListener('click',(e)=>{
    e.stopPropagation();
clearInterval(currentIntervalId);
})
  currentIntervalId = setInterval(()=>{
    $.post("/Services/commentaires.php?action=getReplies",{isbn:isbn+""}).done((d)=>{
    if(isbn==document.getElementById('isbn').value){
    commentaires.innerHTML = d;
    }
  });
  },5000);

idlivre.value=isbn;

console.log(idlivre.value);
// fonction qui met les infos du livre dans popup
popup.style.visibility='visible';
popupTitle.innerText=title;
popupImage.src=img;

  
descriptionContent = $("<strong>Description: </strong>");
spanDescriptionContent = $("<span></span>");
  spanDescriptionContent.text(desc);
description.append(descriptionContent)
  description.append(spanDescriptionContent)

  authorContent = $('<strong>Authors: </strong>');
  spanAuthorContent = $("<span></span>");
  spanAuthorContent.text(auth);
  author.append(authorContent);
  author.append(spanAuthorContent);
  
links.innerHTML= "  <strong> Buy now : </strong></br> <a id='link1' target='_blank'>Amazon <i class='fa fa-amazon'></i> </a>  " 
links2.innerHTML= "<a id='link2' target='_blank'>Apple books <i class='fa fa-apple'></i></a> " 
document.getElementById("link1").href=link;
document.getElementById("link2").href=link2;
overlay.style.visibility='visible';
overlay.style.opacity='1';
};
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
      handleclick(api.isbns[0].isbn13,api.title,api.book_image,api.author,api.description,api.buy_links[0].url,api.buy_links[1].url)
    });
    ulElement.find(".latest_b_img").append(imgElement);
    ulElement.find(".latest_b_text").append(titleElement);
  ulElement.find(".latest_b_text").append(authorElement);
    
    /*let htmlSegmenet = `
    <ul  id="books-ln" class="cs-hidden"> 
      <li > 
        <div class="latest_box"> 
          <div class="latest_b_img">  
     
              <img src=${api.book_image} alt=${api.title}             onclick="handleclick(${api.isbns[0].isbn13},'${api.title}','${api.book_image}','${api.author}','${api.description}','${api.buy_links[0].url}','${api.buy_links[1].url}')" style="width:200px;height:270px;"/> 
          </div>   
          <div class="latest_b_text"> <strong> ${api.title} </strong>  <p>${api.author} </p> </div> 
        </div> 
      </li> 
  </ul>`;
    html += htmlSegmenet;*/
  $('.books_container').append(ulElement);
  });

  /*let container = document.querySelector(".container");

  container.innerHTML = html;*/

}


//DOMContentLoaded est émis lorsque le document HTML initial a été complètement chargé et analysé sans attendre que le css , images etc  aient terminé de charger.
document.addEventListener("DOMContentLoaded",  ()=> {
  renderBooks(); 
  
});
