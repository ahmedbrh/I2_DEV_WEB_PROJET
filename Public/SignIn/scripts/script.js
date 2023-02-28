let signIn = document.getElementById('create-compte')
let signInButton=document.getElementById('createAccount')

var x=0;  //nb click

signInButton.addEventListener('click',(e)=>{
signIn.style.display='block';
x=x+1;
if(x%2==0){       
 signIn.style.display='none'; 
}  
});


  $("#create-compte").submit(function(event) {
    e.preventDefault();
    var ajaxRequest;
    $("#result").html('');
    var values = ($(this).serialize());
       $.post("?page=logging",values).done(()=>{
         console.log("connexion")
         window.location.href="?page=accueil";
       });
  });



  $("#Formulaire-connexion").submit(function(event) {
    e.preventDefault();
    var ajaxRequest;
    $("#result").html('');
    var values = ($(this).serialize());

       $.post("?page=logging",values).done(()=>{
         window.location.href="?page=accueil";
       });
    

  });
