<?php
require_once("database.php");
class Book extends Database{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->getConnection();
    }
  public function get_book_by_isbn($isbn){
     $livres = $this->select("SELECT * from livre WHERE livre.lvr_isbn = :lvr_isbn", array("lvr_isbn"=>$isbn));
      if(count($livres)>0){
        return $livres[0];
      }
      return null;
  }
  public function create_book($isbn){
     $sql = "INSERT INTO livre(lvr_isbn,lvr_resume) VALUES(:lvr_isbn,'resume placeholder')";
    $params = array(
      "lvr_isbn"=>$isbn
    );
    
      $this->insert($sql, $params);
  }
  public function get_or_create_book_by_isbn($isbn){
    
   $livre = $this->get_book_by_isbn($isbn);
    if($livre==null){
      $this->create_book($isbn);
      $livre = $this->get_book_by_isbn($isbn);
    }
      return $livre;
  }
  public function addBookToFavorite($isbn, $username){
    require_once("user.php");
    $user = new User();
    $userid = $user->get_user_by_username($username)["usr_id"];
    $lvr_id = $this->get_or_create_book_by_isbn($isbn)["lvr_id"];
     $params = array(
      "usr_id"=>$userid,
       "lvr_id"=>$lvr_id
    );
    $sql = "INSERT INTO user_favori(usr_id,lvr_id) VALUES(:usr_id,:lvr_id)";
    $this->insert($sql, $params);
  }
    public function removeBookToFavorite($isbn, $username){
    require_once("user.php");
    $user = new User();
    $userid = $user->get_user_by_username($username)["usr_id"];
    $lvr_id = $this->get_or_create_book_by_isbn($isbn)["lvr_id"];
     $params = array(
      "usr_id"=>$userid,
       "lvr_id"=>$lvr_id
    );
    $sql = "DELETE FROM user_favori WHERE usr_id = :usr_id AND lvr_id = :lvr_id";
    $this->delete($sql, $params);
  }
  public function isFavorite($isbn, $username){
    require_once("user.php");
    $user = new User();
    $userid = $user->get_user_by_username($username)["usr_id"];
    $lvr_id = $this->get_or_create_book_by_isbn($isbn)["lvr_id"];
    $params = array(
      "usr_id"=>$userid,
       "lvr_id"=>$lvr_id
    );
    $sql = "SELECT * FROM user_favori WHERE usr_id = :usr_id AND lvr_id = :lvr_id";
    $favorite = $this->select($sql, $params);
    return count($favorite)>0;
  }
  
  

 
	
  
}  ?>