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
  

 
	
  
}  ?>