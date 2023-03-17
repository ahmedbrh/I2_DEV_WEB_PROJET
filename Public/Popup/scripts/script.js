const initializeFavoriteIcon = async (isbn) => {
  var favorite = $("#favorite");
  $.ajax({
  type: 'POST',
  url: "/Services/book.php?action=isFavorite",
  data: {isbn:isbn+""},
  success: (d) => {
    if(d.trim() == "true"){
      favorite.prop( "checked", true );
    }
  },
  async:false
});

}

  $("#success-favorites-add").hide();
  $("#success-favorites-remove").hide();
let popup=document.getElementsByClassName('popup')[0]
let closeBtn = document.getElementsByClassName('close')[0]
let overlay=document.getElementsByClassName('overlay')[0]

initializeFavoriteIcon();
//une fonction qui permet de fermer le popup
const closePopup = ()=>{

  overlay.style.visibility='hidden';
  popup.style.visibility='hidden';
  overlay.style.opacity='0';
  document.getElementById("commentaryArea").innerHTML="";
  console.log("closeee popup");
  // window.location.href=""; a enlever pour essayer la bdd 
}
//

//close popup on click on close btn
closeBtn.addEventListener('click', (e) => {
  closePopup();
})
//close popup on click anywhere out of popup
overlay.addEventListener('click', (e) => {
  e.stopPropagation();
    closePopup();
})

// on click on favorite button (heart)
$('#favorite').click(()=>{
  checked = $('#favorite').prop('checked')
  console.log(checked)
  if(checked){
     $.post("/Services/book.php?action=addFavorite",{isbn:isbn.value+""}).done((d)=>{
                $("#success-favorites-add").fadeTo(2000, 500).slideUp(500, function() {
                  $("#success-favorites-add").slideUp(500);
                });
          });
  }else{
     $.post("/Services/book.php?action=removeFavorite",{isbn:isbn.value+""}).done((d)=>{
            $("#success-favorites-remove").fadeTo(2000, 500).slideUp(500, function() {
                  $("#success-favorites-remove").slideUp(500);
                });
     })
  }
})
    
function reinitializeCommentaryAndRate() {
  document.getElementById("commentaire").value="";
  document.querySelectorAll(".rating>input").forEach(r=>r.checked=false)
}
var spinnerLoadingHtml = '<div id="loading-replies"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>'
let commentaires=document.getElementById('commentaryArea');
  $("#replyForm").submit(function(event) {

    event.preventDefault();
    commentaires.innerHTML = spinnerLoadingHtml;
    var rate = Object.values(document.querySelectorAll(".rating>input")).filter(c=>c.checked)[0];
    var rate = rate?rate.id:1;
    
       $.post("Services/commentaires.php?action=postReply",{commentaire: $("#commentaire").val(), isbn: $("#isbn").val()+"", rate:rate}).done(()=>{
         
                
                  
                $.post("/Services/commentaires.php?action=getReplies",{isbn:isbn.value+""}).done((d)=>{
            commentaires.innerHTML = d;
                  reinitializeCommentaryAndRate();
          });
       });
    

  });
