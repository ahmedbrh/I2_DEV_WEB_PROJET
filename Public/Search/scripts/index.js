//search book using open library api
//ISBN : International Standard Book Number  
//api utilisé  : https://openlibrary.org/dev/docs/api/books 
const handleclick = (isbn, title, img) => {

  let popupTitle = document.getElementById('titlePop');
  let popupImage = document.getElementById('imgPop')
  let overlay = document.getElementsByClassName('overlay')[0]
  let popup = document.getElementsByClassName('popup')[0]
  let commentaires = document.getElementById('commentaryArea');
  let idlivre2 = document.getElementById('isbn2');
  /*let description=document.getElementById('description');
  let author=document.getElementById('authors');
  let links=document.getElementById('links');
  let links2=document.getElementById('links2');*/


  let idlivre = document.getElementById('isbn');
  isbnglobal = isbn;
  idlivre.value = isbn;
  idlivre2.value = isbn;
  console.log(idlivre.value);
  // fonction qui met les infos du livre dans le popup
  popup.style.visibility = 'visible';
  popupTitle.innerText = title;
  popupImage.src = img;
  overlay.style.visibility = 'visible';
  overlay.style.opacity = '1';
};
async function renderBooks() {
  let html = "";
  const booklist = document.getElementById("book-list");
  booklist.innerHTML = "";
  const input = document.getElementById("search");
  const api_url = "https://openlibrary.org/search.json?q=";
  const response = await fetch(api_url + input.value);
  const data = await response.json();
  console.log(data.docs);

  // boucle qui parcouru les données de l'api
  for (let i = 0; i <= data.docs.length; i++) {

    let title = data.docs[i].title;
    title = title.replaceAll('\'', ' ');
    let link = "https://covers.openlibrary.org/b/isbn/" + data.docs[i].isbn[0] + "-L.jpg"
    let isbn = data.docs[i].isbn[0];
    let author = data.docs[i].author_name;
    let firstpublish = data.docs[i].first_publish_year;
    let htmlbook = `<ul  id="books-ln" class="cs-hidden"> <li > <div class="latest_box"> <div class="latest_b_img">   <img onclick="handleclick(${isbn},'${title}','${link}')" src="${link}" /> </div>   <div class="latest_b_text"> <strong> ${title} </strong>  <p>${author}- ${firstpublish} </p> </div> </div> </li> </ul>`;
    booklist.innerHTML += htmlbook;
  }
  //   data.docs.forEach(api => {
  //     let htmlSegmenet = `<ul  id="books-ln" class="cs-hidden"> <li > <div class="latest_box"> <div class="latest_b_img">   <img src="http://covers.openlibrary.org/b/isbn/${api.isbn}-L.jpg"/> </div>   <div class="latest_b_text"> <strong> ${api.title} </strong>  <p>${api.author_name} </p> </div> </div> </li> </ul>`;
  //     html += htmlSegmenet;
  //   });
}
