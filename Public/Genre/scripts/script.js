


// section Genre

//Html content pour sections
let html = '';
let html2 = '';
let html3 = '';
let html4 = '';
let html5= '' ;


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

  for (let i of isbnBooks) {
    let api_url = `https://openlibrary.org/api/books?bibkeys=ISBN:${i}&jscmd=data&format=json`;

    const response = await fetch(api_url);
    const data = await response.json(); 

// Pour tester l'api 
// console.log("title: " + data['ISBN:' + i].title);
// console.log("image: " + data['ISBN:' + i]['cover']['large']);
// console.log("Authors name: " + data['ISBN:' + i].authors[0]['name']);


    let htmlSegmenet = ` <ul  id="Genre-ln" class="cs-hidden" >  <li class="item-a"> <div class="latest_box"> <div class="latest_b_img">  <a>    <img src=${data['ISBN:' + i]['cover']['large']} > </a></div>   <div class="latest_b_text"> <strong>${data['ISBN:' + i].title} </strong>  <p>${data['ISBN:' + i].authors[0]['name']} </p> </div> </div> </li> </ul>`;
    // let htmlSegmenet = ` <li class="item-a"> <div class="latest_box"> <div class="latest_b_img">  <a>    <img src=${data['ISBN:' + i]['cover']['large']} > </a></div>   <div class="latest_b_text"> <strong>${data['ISBN:' + i].title} </strong>  <p>${data['ISBN:' + i].authors[0]['name']} </p> </div> </div> </li> `;
    html += htmlSegmenet;



  }


  for (let y of isbnScifi) {
    let api_url = `https://openlibrary.org/api/books?bibkeys=ISBN:${y}&jscmd=data&format=json`;

    const response = await fetch(api_url);
    const data = await response.json();
    // For test 
// console.log(data);
// console.log("title: " + data['ISBN:' + y].title);
// console.log("image: " + data['ISBN:' + y]['cover']['large']);
// console.log("Authors name: " + data['ISBN:' + y].authors[0]['name']);

 
    let htmlSegmenet2 = `<ul  id="Genre-ln" class="cs-hidden" >  <li class="item-a"> <div class="latest_box"> <div class="latest_b_img">  <a>    <img src=${data['ISBN:' + y]['cover']['large']} > </a></div>   <div class="latest_b_text"> <strong>${data['ISBN:' + y].title} </strong>  <p>${data['ISBN:' + y].authors[0]['name']} </p> </div> </div> </li> </ul> `;
    //let htmlSegmenet2 = ` <li class="item-a"> <div class="latest_box"> <div class="latest_b_img">  <a>    <img src=${data['ISBN:' + y]['cover']['large']} > </a></div>   <div class="latest_b_text"> <strong>${data['ISBN:' + y].title} </strong>  <p>${data['ISBN:' + y].authors[0]['name']} </p> </div> </div> </li> `;
    html2 += htmlSegmenet2;



  }
  // ---------------------- IT section
  for (let x of isbnInfo) {
    let api_url = `https://openlibrary.org/api/books?bibkeys=ISBN:${x}&jscmd=data&format=json`;

    const response = await fetch(api_url);
    const data = await response.json();


    // console.log("title: " + data['ISBN:' + x].title);
    // console.log("image: " + data['ISBN:' + x]['cover']['large']);


    // console.log("Authors name: " + data['ISBN:' + x].authors[0]['name']);


    let htmlSegmenet3 = ` <ul  id="Genre-ln" class="cs-hidden" > <li class="item-a"> <div class="latest_box"> <div class="latest_b_img">  <a>    <img src=${data['ISBN:' + x]['cover']['large']} > </a></div>   <div class="latest_b_text"> <strong>${data['ISBN:' + x].title} </strong>  <p>${data['ISBN:' + x].authors[0]['name']} </p> </div> </div> </li> </ul>`;
    html3 += htmlSegmenet3;



  }
  // ----------------------Thriller section----------------

  for (let b of isbnThriller) {
    let api_url = `https://openlibrary.org/api/books?bibkeys=ISBN:${b}&jscmd=data&format=json`;

    const response = await fetch(api_url);
    const data = await response.json();


    // console.log("title: " + data['ISBN:' + b].title);
    // console.log("image: " + data['ISBN:' + b]['cover']['large']);


    // console.log("Authors name: " + data['ISBN:' + b].authors[0]['name']);


    let htmlSegmenet4 = ` <ul  id="Genre-ln" class="cs-hidden" > <li class="item-a"> <div class="latest_box"> <div class="latest_b_img">  <a>    <img src=${data['ISBN:' + b]['cover']['large']} > </a></div>   <div class="latest_b_text"> <strong>${data['ISBN:' + b].title} </strong>  <p>${data['ISBN:' + b].authors[0]['name']} </p> </div> </div> </li> </ul>`;
    html4 += htmlSegmenet4;



  }



// ------------------Manga----------------------------- 


for (let m of isbnManga) {
    let api_url = `https://openlibrary.org/api/books?bibkeys=ISBN:${m}&jscmd=data&format=json`;

    const response = await fetch(api_url);
    const data = await response.json();
    // For test 
// console.log(data);
// console.log("title: " + data['ISBN:' + y].title);
// console.log("image: " + data['ISBN:' + y]['cover']['large']);
// console.log("Authors name: " + data['ISBN:' + y].authors[0]['name']);

 
    let htmlSegmenet5 = `<ul  id="Genre-ln" class="cs-hidden" >  <li class="item-a"> <div class="latest_box"> <div class="latest_b_img">  <a>    <img src=${data['ISBN:' + m]['cover']['large']} > </a></div>   <div class="latest_b_text"> <strong>${data['ISBN:' + m].title} </strong>  <p>${data['ISBN:' + m].authors[0]['name']} </p> </div> </div> </li> </ul> `;
    //let htmlSegmenet2 = ` <li class="item-a"> <div class="latest_box"> <div class="latest_b_img">  <a>    <img src=${data['ISBN:' + y]['cover']['large']} > </a></div>   <div class="latest_b_text"> <strong>${data['ISBN:' + y].title} </strong>  <p>${data['ISBN:' + y].authors[0]['name']} </p> </div> </div> </li> `;
    html5 += htmlSegmenet5;



  }


    // Assignation des varibales 
  let container = document.getElementById("romance");
  container.innerHTML = html;
  let science = document.getElementById("scifiction");
  science.innerHTML = html2;
  let itBook = document.getElementById('IT_books');
  itBook.innerHTML = html3;
  let thrillerBooks = document.getElementById('thriller');
  thrillerBooks.innerHTML = html4;

  let mangaBooks= document.getElementById('manga'); 
  mangaBooks.innerHTML=html5;    
}

// appelle de la fonction renderGenre pour l'afficher dans la section  Genre

renderGenre();  
















// console.log("test");
