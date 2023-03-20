<?php 
session_start();
$action = "";
if(isset($_GET["action"])){
  $action = $_GET["action"];
}
switch ($action){
  case "addFavorite":
    if(isset($_POST["isbn"])){
      chdir("../");
      require_once('Controller/popupController.php');
      $popupController = new PopupController();
      $popupController->addFavorite($_POST["isbn"]);
    }
  break;
    
  case "removeFavorite":
    if(isset($_POST["isbn"])){
      chdir("../");
      require_once('Controller/popupController.php');
      $popupController = new PopupController();
      $popupController->removeFavorite($_POST["isbn"]);
    }
  break;
  case "isFavorite":
    if(isset($_POST["isbn"]) && isset($_SESSION["user"])){
      chdir("../");
      require_once('Controller/popupController.php');
      $popupController = new PopupController();
      if ($popupController->isFavorite($_POST["isbn"])){
        echo "true";
      }else{
        echo "false";
      }
    }
  break;
}


?>