<?php
session_start();
    $nc = new NotifController();
    $nc->renderNotifs();
  
class NotifController {
  function __construct(){
    $titre = "Notif";
  }

 function renderNotifs(){
   require_once("../Model/friend.php");
   $mf = new Friend();
   $respuser = $mf->get_not_accepted_friend($_SESSION["user"]);
   foreach($respuser as $friend){
     echo 
       "<div class='notification-friend-request'><b>".
       $friend["usr_nom"]."</b> souhaiterai être votre ami"
       .
       "<button>accepter</button><button>refuser</button></div>"
       ;
   }
   
 }

}
?>

