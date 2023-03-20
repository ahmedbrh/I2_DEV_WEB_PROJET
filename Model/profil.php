<?php
require_once("database.php");
class Profil extends Database{

   public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->getConnection();
    }

  public function renderProfil(){
    	include_once "View/Profil/profil.php";
  }

  public function getFavoris($username){
    $req= "SELECT l.lvr_isbn 
      FROM user_favori uf
      inner join livre l on uf.lvr_id = l.lvr_id 
      INNER JOIN users u on uf.usr_id = u.usr_id
      where u.usr_nom = :user;";

     return $this->select($req, ["user" => $username]);
  }

  public function getFavorisAmis(){
    echo "bonjour";
  }

  
}

?>

