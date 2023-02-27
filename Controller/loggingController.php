<?php
require_once("Model/user.php");
class LoggingController {
  function __construct(){
    $titre = "SignIn";
    
    
    if(isset($_POST["inscription"])){
      $username = $_POST['username'];
      $mail =$_POST['email2'];
      $pass = $_POST['password2'];
      $passconf = $_POST['passwordconf'];
      $error = False;
      if($pass != $passconf){
        $error = True;
        echo "<div class='alert alert-danger' role='alert'>Les mots de passe ne sont pas identique</div>";
      }
      $user = new User;
      if (count($user->get_user($adressemail))>0) {
        $error = True;
          echo "<div class='alert alert-danger' role='alert'>Cette adresse mail est déjà utilisée</div>";
        }
      if($error==False){
        require_once( "Model/user.php" );
        $userModel = new User(); 
        $userModel->create_user($mail,$pass,$username);
        if(isset($username)){
          $_SESSION["user"] = $username;
        }
      }
      
    }

    if(isset($_POST["connexion"]) ) {
      $mail =$_POST['email1'];
      $pass= $_POST['password1'];
      require_once( "Model/user.php" );
      $userModel = new User();
      $username = $userModel->connect_user($mail, $pass); // returns username
      if(isset($username)){
        $_SESSION["user"] = $username;
      }
    }
   
    if(isset($_POST["deconnexion"])){
      session_destroy();
    }
    
  }

  function renderLogging(){
    include "View/SignIn/content.php"; 
  }

}

