<?php
require_once("Model/user.php");
class ProfilController {

  function __construct(){
    $titre="profil";

    $this->handlePostAddFriend();
  }

  function renderProfil(){
    	include "View/Profil/profil.php";
  }

  public function handlePostAddFriend() {
    if (isset($_POST["demande"])) {
      $mail = $_POST["email"];
      $usr = new User();
      $usr_friend = $usr->get_user($mail);
      if(count($usr_friend)!=1) {
        echo "L'utilisateur saisie n'existe pas";
      }
      else {
        $usr_friend = $usr_friend[0]['usr_id'];
        require_once("Model/friend.php");
        $friend = new Friend();
        $me = $usr->get_user_by_username($_SESSION['user'])['usr_id'];
        if ($me !== $usr_friend) {
          if(count($friend->request_already_exist($me, $usr_friend)) > 0) {
            echo "Vous avez déjà une demande en attente avec cet utilisateur, ou vous êtes déjà amis avec celui-ci !";
          }
          else {
            try {
              $friend->add_friend_request($me, $usr_friend);
            } catch (Exception $e) {
              echo "Une erreur est survenue veuillez réessayer plsu tard !";
            }
          }
        }
        else {
          echo "Vous ne pouvez pas vous ajouter vous même";
        }
      }
    }
  }
  
}

?>

