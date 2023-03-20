<?php
require_once("Model/user.php");
class LoggingController
{
  function __construct()
  {
    $titre = "SignIn";


    $this->handlePostInscription();
    $this->handlePostConnexion();
    $this->handlePostDeconnexion();
  }
  function handlePostInscription()
  {
    if (isset($_POST["inscription"])) {
      $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
      
      if (!$token || $token !== $_SESSION['token']) {
          echo "<div class='alert alert-danger' role='alert'>Methode non 
autoriser</div>";
      } else {
      $username = $_POST['username'];
      $mail = $_POST['email2'];
      $pass = $_POST['password2'];
      $passconf = $_POST['passwordconf'];
      $error = False;
      if (empty($username) || empty($mail) || empty($pass)) {
        echo "<div class='alert alert-danger' role='alert'>Veuillez remplir tout les champs</div>";
      } else {
        if ($pass != $passconf) {
          $error = True;
          echo "<div class='alert alert-danger' role='alert'>Les mots de passe ne sont pas identique</div>";
        }
        if ($pass)
          $user = new User;
        $tmpUserMail = $user->get_user($mail);
        if (count($tmpUserMail) > 0) {
          $error = True;
          echo "<div class='alert alert-danger' role='alert'>Cette adresse mail est déjà utilisée</div>";
        }
        $tmpUserName = $user->get_user_by_username($username);
        if (count($tmpUserName) > 0) {
          $error = True;
          echo "<div class='alert alert-danger' role='alert'>Ce nom d'utilisateur est déjà utilisée</div>";
        }
        if ($error == False) {
          require_once("Model/user.php");
          $userModel = new User();
          $userModel->create_user($mail, $pass, $username);
          if (isset($username)) {
            $_SESSION["user"] = $username;
            echo '<meta http-equiv="refresh" content="0;url=https://devwebi2.younessrihr.repl.co/?page=accueil">';
          }
        }
      }
      }      
    }
  }

  function handlePostConnexion()
  {
    if (isset($_POST["connexion"])) {
      $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
      
      if (!$token || $token !== $_SESSION['token']) {
          echo "<div class='alert alert-danger' role='alert'>Methode non 
autoriser</div>";
      } else {
        $mail = $_POST['email1'];
        $pass = $_POST['password1'];
        require_once("Model/user.php");
        $userModel = new User();
        $username = $userModel->connect_user($mail, $pass); // returns username if null then mail or pass is invalid
        if (isset($username)) {
          $_SESSION["user"] = $username;
          echo '<meta http-equiv="refresh" content="0;url=https://devwebi2.younessrihr.repl.co/?page=accueil">';
        } else {
          echo "<div class='alert alert-danger' role='alert'>Adresse email ou mot de passe invalide.</div>";
        }
      }
    }
  }

  function handlePostDeconnexion()
  {
    if (isset($_POST["deconnexion"])) {
      session_destroy();
    }
  }
  function renderLogging()
  {
    include "View/SignIn/content.php";
  }
}
