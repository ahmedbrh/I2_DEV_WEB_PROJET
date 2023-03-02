/*export default class Popup{
constructor(isbn,title){
this.isbn=isbn;
this.commentaires=[]; //appel de la bdd
this.title=title;
}

}
*/

let popup=document.getElementsByClassName('popup')[0]
let closeBtn = document.getElementsByClassName('close')[0]
let overlay=document.getElementsByClassName('overlay')[0]

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
closeBtn.addEventListener('click',(e)=>{
  closePopup();
})
//close popup on click anywhere out of popup
overlay.addEventListener('click',(e)=>{
  e.stopPropagation();
    closePopup();
})

function reinitializeCommentaryAndRate(){
  document.getElementById("commentaire").value="";
  document.querySelectorAll(".rating>input").forEach(r=>r.checked=false)
}

  $("#replyForm").submit(function(event) {

    event.preventDefault();
    var rate = Object.values(document.querySelectorAll(".rating>input")).filter(c=>c.checked)[0];
    var rate = rate?rate.id:1;
    let commentaires=document.getElementById('commentaryArea');
       $.post("Services/commentaires.php?action=postReply",{commentaire: $("#commentaire").val(), isbn: $("#isbn").val()+"", rate:rate}).done(()=>{
                
                  
                $.post("/Services/commentaires.php?action=getReplies",{isbn:isbn.value+""}).done((d)=>{
            commentaires.innerHTML = d;
                  reinitializeCommentaryAndRate();
          });
       });
    

  });
