
// la cle 
const key = "n6RRK59oCG9F0PA8u0fG2vNvEuILEE9Z";
const api_url = `https://api.nytimes.com/svc/books/v3/lists/current/hardcover-fiction.json?api-key=${key}`;

const getBooks = async () => {
  // fetche
  const response = await fetch(api_url);

  const data = await response.json();
  console.log(data);
  console.log(data.results);
  return data; //api
};
const handleclick=(isbn,title,img)=>{

let popupTitle=document.getElementById('titlePop');
let popupImage=document.getElementById('imgPop')
let popup=document.getElementsByClassName('overlay')[0]
popupTitle.innerText=title;
popupImage.src=img;
popup.style.visibility='visible';
popup.style.opacity='1';
};
async function renderBooks() {
  let y = await getBooks();
  let html = "";
  y.results.books.forEach(api => {
    let htmlSegmenet = `<ul  id="books-ln" class="cs-hidden"> <li > <div class="latest_box"> <div class="latest_b_img">  <a >    <img src=${api.book_image} alt=${api.title} onclick="handleclick(${api.isbns[0].isbn13},'${api.title}','${api.book_image}')" "/> </a></div>   <div class="latest_b_text"> <strong> ${api.title} </strong>  <p>${api.author} </p> </div> </div> </li> </ul>`;
    html += htmlSegmenet;
  });

  let container = document.querySelector(".container");
  container.innerHTML = html;
}

document.addEventListener("DOMContentLoaded", function () {
  renderBooks();

});
