
let renderBook = (data, container) => {
 ulElement = $('<ul  class="books-ln" class="cs-hidden"><li><div class="latest_box"> <div class="latest_b_img"></div><div class="latest_b_text"></div></div></li></ul>')
      let isbn = data.volumeInfo.industryIdentifiers[1] ? 
        data.volumeInfo.industryIdentifiers[1].identifier : data.volumeInfo.industryIdentifiers[0].identifier
      let bookTitle = data.volumeInfo.title
    let bookAuthors = data.volumeInfo.authors
    let bookImage = data.volumeInfo.imageLinks.medium
      titleElement = $('<strong></strong>');
      if(bookTitle.length>15){
        titleElement.text(bookTitle.substring(0,15)+"...");
      }else{
        titleElement.text(bookTitle);
      }
      
      authorElement = $('<p class="authors"></p>');
  
       if(bookAuthors[0].length>17){
         authorElement.text(bookAuthors[0].substring(0,17)+"...");
      }else{
        authorElement.text(bookAuthors[0]);
      }
  
      imgElement = $('<img></img>');
      imgElement.attr("src",bookImage);
      imgElement.attr("alt",bookTitle);
      imgElement.click(function() {
        openPopup(isbn,bookTitle,bookImage,bookAuthors[0],"api.description","api.buy_links[0].url","api.buy_links[1].url")
      });
      ulElement.find(".latest_b_img").append(imgElement);
      ulElement.find(".latest_b_text").append(titleElement);
    ulElement.find(".latest_b_text").append(authorElement);
      container.append(ulElement) ;
 

} 

var query = ''
var URL = ''

googleapikey = "AIzaSyBywUVAvQ9dw6Nmhzlwlv-EZyaf8lbZ7GQ"
let clearPrevious = () =>{
  $("#book-list").html("");
}


async function getAndShowBookData(volumeId){
  booksContainer = $("#book-list")
  url=`https://www.googleapis.com/books/v1/volumes/${volumeId}?key=${googleapikey}`
  $.ajax({
      url: url.toString(),
      dataType: 'json',
      success: function(data){
        renderBook(data, booksContainer)
        console.log(data)
      }})
}
$("#enter").click(function(e){
  e.preventDefault();
   query = document.getElementById('search').value
    document.getElementById('search').value = ''
    URL = 'https://www.googleapis.com/books/v1/volumes?q='+query

    clearPrevious();
    $.ajax({
      url: URL.toString(),
      dataType: 'json',
      success: function(data){
        for(item of data.items){
          getAndShowBookData(item.id)
        }
      }})

   //end ajax success function
    
 
}) 
    //get the info for the query out of the search bar and turn it
    //into the URL to feed to the AJAX call
   


