var query = ''
var URL = ''

// popup info 
  let popupTitle = document.getElementById('titlePop');
  let popupImage = document.getElementById('imgPop')
  let overlay = document.getElementsByClassName('overlay')[0]
  let popup = document.getElementsByClassName('popup')[0]
  let commentaires = document.getElementById('commentaryArea');
  let idlivre2 = document.getElementById('isbn2');




document.getElementById('enter').onclick = function(){
    //get the info for the query out of the search bar and turn it
    //into the URL to feed to the AJAX call
    query = document.getElementById('search').value
    document.getElementById('searchbar').value = ''
    URL = 'https://www.googleapis.com/books/v1/volumes?q='+query

    clearPrevious();
    $.ajax({
      url: URL.toString(),
      dataType: 'json',
      success: function(data){
      console.log(data);

      }

   }//end ajax success function
    )

}
