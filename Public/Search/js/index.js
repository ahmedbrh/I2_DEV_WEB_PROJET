//search book using open library api

async function renderBooks() {
  let html = "";
  const booklist = document.getElementById("book-list");
  booklist.innerHTML = "";
  const input = document.getElementById("search");
  const api_url = "https://openlibrary.org/search.json?q=";
  const response = await fetch(api_url + input.value);
  const data = await response.json();
  console.log(data.docs);
  //   console.log(data.docs[0].isbn);
  //   console.log(data.docs[1].isbn);
  //   console.log(data.docs[2].isbn);
  //   console.log(data.docs[3].isbn);
  //   console.log(data.docs[4].isbn);
  //   console.log("--------isbn--------------");
  //   console.log(data.docs[0].isbn[0]);
  //   console.log(data.docs[1].isbn[0]);
  //   console.log(data.docs[2].isbn[0]);
  //   console.log(data.docs[3].isbn[0]);
  //   console.log(data.docs[4].isbn[0]);
  //   console.log("-------------loop-----------------------");
  let img = 0;
  for (let i = 0; i <= data.docs.length; i++) {
    img++;
    let htmlbook = `<ul  id="books-ln" class="cs-hidden"> <li > <div class="latest_box"> <div class="latest_b_img">   <img src="https://covers.openlibrary.org/b/isbn/${data.docs[i].isbn[0]}-L.jpg" /> </div>   <div class="latest_b_text"> <strong> ${data.docs[i].title} </strong>  <p>${data.docs[i].author_name}- ${data.docs[i].first_publish_year} </p> </div> </div> </li> </ul>`;
    booklist.innerHTML += htmlbook;
  }
  //   data.docs.forEach(api => {
  //     let htmlSegmenet = `<ul  id="books-ln" class="cs-hidden"> <li > <div class="latest_box"> <div class="latest_b_img">   <img src="http://covers.openlibrary.org/b/isbn/${api.isbn}-L.jpg"/> </div>   <div class="latest_b_text"> <strong> ${api.title} </strong>  <p>${api.author_name} </p> </div> </div> </li> </ul>`;
  //     html += htmlSegmenet;
  //   });
}
