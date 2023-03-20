<?php
  
    session_start();
    if(isset($_GET["renderNotifs"])){
       NotifController::renderNotifs();
    }
   
    if(isset($_POST["acceptFriend"])){
      NotifController::acceptFriend($_POST["acceptFriend"]);
    }
    if(isset($_POST["refuseFriend"])){
      NotifController::refuseFriend($_POST["refuseFriend"]);
    }
  
class NotifController {
  function __construct(){
    $titre = "Notif";
  }

 public static function  renderNotifs(){
   require_once("../Model/friend.php");
   $mf = new Friend();
   $respuser = $mf->get_not_accepted_friend($_SESSION["user"]);
   foreach($respuser as $friend){
     echo 
       "<div class='notification-friend-request' ><b>".
       $friend["usr_nom"]."</b> souhaiterai être votre ami"
       .
       "</br><button class='accept_friend' onClick='acceptFriend(".$friend["usr_id"].")'>accepter</button>
<button class='refuse_friend' onClick='refuseFriend(".$friend["usr_id"].")'>refuser</button></div>"
       ;
   }
 }

  public static function acceptFriend($user_id){
       require_once("../Model/friend.php");
        $mf = new Friend();
        $mf->accept_friend($user_id);
  }
   public static function refuseFriend($user_id){
       require_once("../Model/friend.php");
        $mf = new Friend();
        $mf->refuse_friend($user_id);
  }

}
?>

