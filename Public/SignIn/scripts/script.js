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



