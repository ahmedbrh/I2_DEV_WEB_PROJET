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
  fetch("/Controller/notifController.php").then(r=>r.text()).then(h=>{
   document.getElementById("myDropdown").innerHTML = h;
  })
}

//get notifications from php service