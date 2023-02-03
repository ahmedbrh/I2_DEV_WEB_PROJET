
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
  console.log(data);
  console.log(data.results);
  return data; //api
};
 
 

// popup  
// fonction handleClick pour le popup
// un Livre a pour attributs: image, title, ISBN,desc , author 
// la fonction handleclick s'éxecute quand on clique sur un livre en lui passant plusieurs parametres 
const handleclick=(isbn,title,img,auth,desc,link,link2)=>{

let popupTitle=document.getElementById('titlePop');
let popupImage=document.getElementById('imgPop')
let overlay=document.getElementsByClassName('overlay')[0]
let popup=document.getElementsByClassName('popup')[0]
let commentaires=document.getElementById('commentaryArea');
let description=document.getElementById('description');
let author=document.getElementById('authors');
let links=document.getElementById('links');
let links2=document.getElementById('links2');
let idlivre=document.getElementById('isbn');
let idlivre2=document.getElementById('isbn2');

idlivre.value=isbn;
idlivre2.value=isbn;

console.log(idlivre.value);
// fonction qui met les infos du livre dans popup
popup.style.visibility='visible';
popupTitle.innerText=title;
popupImage.src=img;
description.innerHTML= "<strong> Description </strong> :"+desc;
author.innerHTML="<h1> Author: "+auth+"</h1>";
links.innerHTML= "  <strong> Buy now : </strong></br> <a href='"+link+"' target='_blank'>Amazon   <i class='fa fa-amazon'></i> </a>  " 
links2.innerHTML= "<a href='"+link2+"' target='_blank'>Apple books <i class='fa fa-apple'></i></a>   " 
overlay.style.visibility='visible';
overlay.style.opacity='1';
};
// function pour render tous les livres section  TOPSellerbooks
async function renderBooks() {
  let y = await getBooks();
  let html = "";
 

 // Playing with data api 
 // ForEach : pour selection tous l'api 
  y.results.books.forEach(api => {
    let htmlSegmenet = `<ul  id="books-ln" class="cs-hidden"> <li > <div class="latest_box"> <div class="latest_b_img">  <a> <form action="index.php" method="POST">   <img src=${api.book_image} alt=${api.title} onclick="handleclick(${api.isbns[0].isbn13},'${api.title}','${api.book_image}','${api.author}','${api.description}','${api.buy_links[0].url}','${api.buy_links[1].url}')" style="width:200px;height:270px;"/> </a></div>   <div class="latest_b_text"> <strong> ${api.title} </strong>  <p>${api.author} </p> </div> </div> </li> </ul>`;
    html += htmlSegmenet;
  });

  let container = document.querySelector(".container");
  container.innerHTML = html;
}


//DOMContentLoaded est émis lorsque le document HTML initial a été complètement chargé et analysé sans attendre que le css , images etc  aient terminé de charger.
document.addEventListener("DOMContentLoaded",  ()=> {
  renderBooks(); 

});
