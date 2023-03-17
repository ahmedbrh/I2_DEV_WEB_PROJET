<?php
class PopupController {
  function __construct(){
    $titre = "Popup";
  }

  function renderPopup(){
    include "View/Popup/popup.php"; 
  }
  function htmlRateStars($rate){
     $html = '<div class="reply-rating">';
      for($i=0; $i<$rate;$i++){
        $html = $html.'<label>&#9733;</label>';
      }
      for($i=0; $i<5-$rate;$i++){
        $html = $html.'<label>☆</label>';
      }
      $html = $html.'</div>';
    return $html;
  }
  function getPopupReplies($isbn){
    
    require_once("Model/comments.php");
    require_once("Model/user.php");
    $userModel = new User();
    $commentaireModel = new Commentaire();
    $replies = $commentaireModel->get_book_replies($isbn);
    if($replies != null){
    foreach($replies as $reply){
      $reply_date = date_create($reply["cmt_date"]);
      
      $username = $reply["usr_nom"];
       echo 
        "<div class='commentaire'>
            <div class='commentaireHeader'>
                <div class='avatarandname'> 
                    <img src='https://pbs.twimg.com/profile_images/911523367492161536/XDOQPjqf_400x400.jpg' width='50px' height='50px' id='avatar'/>
                    <div id='user-time'><strong class='username'>".$username."</strong></br>
 <time class='date'>".date_format($reply_date, 'd-m-Y')."</time></div>
                </div>
               
              </div>". $this->htmlRateStars($reply["cmt_note"])."<div class='commentaireContent'><p>".html_entity_decode($reply["cmt_description"], ENT_COMPAT, 'UTF-8')."</p></div>
        </div>";
     
    }
    }
    
  }

  function postReply($reply, $rate, $username, $isbn){
    require_once("Model/user.php");
    require_once("Model/book.php");
    $usrModal = new User();
    $bookModal = new Book();
    $user = $usrModal->get_user_by_username($username);
    $livre = $bookModal->get_or_create_book_by_isbn($isbn);
    $usr_id = intval($user["usr_id"]);
    $lvr_id = intval($livre["lvr_id"]);
    require_once("Model/comments.php");
    $commentsModal = new Commentaire();
    $commentsModal->create_reply($reply, $rate, $usr_id, $lvr_id);
  }

  function addFavorite($isbn) {
    require_once("Model/book.php");
    $bookModal = new Book();
    $username = $_SESSION["user"];
    $bookModal->addBookToFavorite($isbn, $username);
    
  }

  function removeFavorite($isbn){
    require_once("Model/book.php");
    $bookModal = new Book();
    $username = $_SESSION["user"];
    $bookModal->removeBookToFavorite($isbn, $username);
    
  }
  function isFavorite($isbn){
    require_once("Model/book.php");
    $bookModal = new Book();
    $username = $_SESSION["user"];
    return $bookModal->isFavorite($isbn, $username);
  }

}
?>

