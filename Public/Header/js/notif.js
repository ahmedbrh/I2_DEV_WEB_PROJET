document.getElementById("notif_container").addEventListener("click", (e)=>{
  
    myFunction();
  document.getElementsByClassName("bi-bell-fill")[0].classList.toggle("showBell");
  getNotifs();
})


function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

async function getNotifs(){
  let username = document.getElementsByClassName("user_name")[0].textContent
  fetch("/Controller/notifController.php?renderNotifs").then(r=>r.text()).then(h=>{
    if(h.trim()!=""){
      document.getElementById("myDropdown").innerHTML = h;
    }else{
      document.getElementById("myDropdown").innerHTML = "<p style='text-align:center;margin-top:5%;'>Aucune notification...</p>";
    }
   
  })
}

function acceptFriend(id){
       $.post("Controller/notifController.php",{acceptFriend:id}).done((d)=>getNotifs())
}

function refuseFriend(id){
          $.post("Controller/notifController.php",{refuseFriend:id}).done((d)=>getNotifs())
}

//get notifications from php service