

let getUlBooks = (data) => {
 ulElement = $('<ul  class="books-ln" class="cs-hidden"><li><div class="latest_box"> <div class="latest_b_img"></div><div class="latest_b_text"></div></div></li></ul>')
  Object.values(data).forEach(api => {
      let isbn = api.identifiers.isbn_13 ? api.identifiers.isbn_13[0] : api.identifiers.isbn_10[0]
      
      titleElement = $('<strong></strong>');
      if(api.title.length>15){
        titleElement.text(api.title.substring(0,15)+"...");
      }else{
        titleElement.text(api.title);
      }
      
      authorElement = $('<p class="authors"></p>');
  
       if(api.authors[0]["name"].length>17){
         authorElement.text(api.authors[0]["name"].substring(0,17)+"...");
      }else{
        authorElement.text(api.authors[0]["name"]);
      }
  
      imgElement = $('<img></img>');
      imgElement.attr("src",api.cover["medium"]);
      imgElement.attr("alt",api.title);
      imgElement.click(function() {
        handleclick(isbn,api.title,api.cover["medium"],api.authors[0]["name"],"api.description","api.buy_links[0].url","api.buy_links[1].url")
      });
      ulElement.find(".latest_b_img").append(imgElement);
      ulElement.find(".latest_b_text").append(titleElement);
    ulElement.find(".latest_b_text").append(authorElement);
      return ulElement;
    });
  return ulElement;
} 
const popupCloseListening = () =>{
   let closeBtn = document.getElementsByClassName('close')[0]
   var overlay=document.getElementsByClassName('overlay')[0]
   
  closeBtn.addEventListener("click",(e)=>{
    clearInterval(currentIntervalId);
    $("#favorite").prop( "checked", false );
  });
  overlay.addEventListener('click',(e)=>{
    e.stopPropagation();
    clearInterval(currentIntervalId);
    $("#favorite").prop( "checked", false );
  })
  
}
function handleclick(isbn,title,img,auth,desc,link,link2){
  var popupTitle=document.getElementById('titlePop');
  var popupImage=document.getElementById('imgPop')
  var overlay=document.getElementsByClassName('overlay')[0]
  var popup=document.getElementsByClassName('popup')[0]
  var description=$('#description');
  var author=$('#authors');
  var links=document.getElementById('links');
  var links2=document.getElementById('links2');
  var commentaires = document.getElementById('commentaryArea');
  var idlivre=document.getElementById('isbn');

  //Insertion du spinner de chargement dans les commentaires en attendant le bon chargement de tout les données
  commentaires.innerHTML=spinnerLoadingHtml;
  
  //Listener sur la fermeture du popup, arret de l'intervale qui recupere les commentaires periodiquement
  popupCloseListening();

  //Si l'icone du coeur est présente c'est qu'on est connecté alors ont verifie si le livre est favori pour afficher le coeur en noir
  if(document.getElementById("favorite")){
    initializeFavoriteIcon(isbn);
  }

  
  // Récupération périodique des commentaires
  currentIntervalId = setInterval(()=>{
    $.post("/Services/commentaires.php?action=getReplies",{isbn:isbn+""}).done((d)=>{
    if(isbn==document.getElementById('isbn').value){
    commentaires.innerHTML = d;
    }
  });
  },5000);

idlivre.value=isbn;

// fonction qui met les infos du livre dans popup
popup.style.visibility='visible';
popupTitle.innerText=title;
popupImage.src=img;

  
descriptionContent = $("<strong>Description: </strong>");
spanDescriptionContent = $("<span></span>");
  spanDescriptionContent.text(desc);
description.html(descriptionContent)
  description.append(spanDescriptionContent)

  authorContent = $('<strong>Authors: </strong>');
  spanAuthorContent = $("<span></span>");
  spanAuthorContent.text(auth);
  author.html(authorContent);
  author.append(spanAuthorContent);
  
links.innerHTML= "  <strong> Buy now : </strong></br> <a id='link1' target='_blank'>Amazon <i class='fa fa-amazon'></i> </a>  " 
links2.innerHTML= "<a id='link2' target='_blank'>Apple books <i class='fa fa-apple'></i></a> " 
document.getElementById("link1").href=link;
document.getElementById("link2").href=link2;
overlay.style.visibility='visible';
overlay.style.opacity='1';
};
    let science = $("#scifiction");
  let romance = $("#romance");
    let itBook = $('#IT_books');
    let mangaBooks= $('#manga'); 
  let thrillerBooks = $('#thriller');
let kinds=[mangaBooks,science,romance,itBook,thrillerBooks]
// section Genre



async function renderGenre() {

  //romance book  section 
  let isbnBooks = ["9780241962473", "8496546993", "8466308989", "0141439343", "0521824362"]; //Ajouter l'isbn d'un livre dans ce tableau pour l'ajouter dans la section romance  (manually)
//  let isbnBooks = ["9780241962473", "8496546993", "8466308989", "9788491621249", "0521824362", "8466314687", "0141439343", "9780585008677"];
  //------------Sci Fiction-----------

  let isbnScifi = ["3453300440", "080490040X", "0671461494", "9861633839", "1403945772"];
   //Ajouter l'isbn d'un livre dans ce tableau pour l'ajouter dans la section Sci-fiction 
//  let isbnScifi = ["3453300440", "080490040X", "0671461494", "0517119129", "1403945772", "0375844724", "9861633839", "0373247559", "1596922591"];

  // --------------- IT isbn --------------------

  let isbnInfo = ["9780596000851", "1726643026", "9781720043997", "9781844807017", "9782744021428"];
  // --------------- Thriller--------------------

  let isbnThriller = ["9780843960846", "0922066728", "0670813648", "0099511223", "9780553199864"];

  // --------------- Manga--------------------

  let isbnManga = [ "9781421585642","9781612620244", "9781421582696", "9781415638286", "9781591168072"];


// select tout les api 
  let dataMangas=[];
  let dataRomance=[];
  let dataIt=[];
  let dataThriller=[];
  let dataScifi=[];
  for (let i of isbnBooks) {
    let api_url = `https://openlibrary.org/api/books?bibkeys=ISBN:${i}&jscmd=data&format=json`;
    fetch(api_url).then(r=>r.json()).then(d=>{
    ulRomance = getUlBooks(d);
    romance.append(ulRomance);                 
    })
      
  }


  for (let y of isbnScifi) {
    let api_url = `https://openlibrary.org/api/books?bibkeys=ISBN:${y}&jscmd=data&format=json`;
    fetch(api_url).then(r=>r.json()).then(d=>{
      ulScience = getUlBooks(d);
    science.append(ulScience);           
    })
  }
  // ---------------------- IT section
  for (let x of isbnInfo) {
    let api_url = `https://openlibrary.org/api/books?bibkeys=ISBN:${x}&jscmd=data&format=json`;
    fetch(api_url).then(r=>r.json()).then(d=>{
     ulInfo = getUlBooks(d);
    itBook.append(ulInfo);                
    })
  }
  // ----------------------Thriller section----------------

  for (let b of isbnThriller) {
    let api_url = `https://openlibrary.org/api/books?bibkeys=ISBN:${b}&jscmd=data&format=json`;
    fetch(api_url).then(r=>r.json()).then(d=>{
    ulThriller = getUlBooks(d);
    thrillerBooks.append(ulThriller);             
    })
  }
// ------------------Manga----------------------------- 

for (let m of isbnManga) {
    let api_url = `https://openlibrary.org/api/books?bibkeys=ISBN:${m}&jscmd=data&format=json`;
    fetch(api_url).then(r=>r.json()).then(d=>{
    ulManga = getUlBooks(d);
    mangaBooks.append(ulManga);          
    })
  }







}


// appelle de la fonction renderGenre pour l'afficher dans la section  Genre

renderGenre();  
















// console.log("test");
