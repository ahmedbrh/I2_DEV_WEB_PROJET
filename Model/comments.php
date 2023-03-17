<?php
require_once("database.php");
class Commentaire extends Database{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->getConnection();
    }
  
  public function create_reply($cmt_description, $cmt_note, $usr_id, $lvr_id){
    $sql = "INSERT INTO users_comments(usr_id,lvr_id,cmt_date,cmt_description,cmt_note) VALUES(:usr_id,:lvr_id,:cmt_date,:cmt_description,:cmt_note)";
    $params = array(
      "usr_id"=>$usr_id,
      "lvr_id"=>$lvr_id,
      "cmt_date"=>date("Y-m-d h:i:sa"),
      "cmt_description"=>$cmt_description,
      "cmt_note"=>$cmt_note
    );
    $this->insert($sql, $params);
  }
  public function get_book_replies($isbn){
    //replies = array();
    return $this->select("
SELECT users.usr_nom, users_comments.cmt_note, users_comments.cmt_date, users_comments.cmt_description from users_comments 
INNER JOIN livre on livre.lvr_id = users_comments.lvr_id
INNER JOIN users on users_comments.usr_id = users.usr_id
WHERE livre.lvr_isbn=:lvr_isbn
", array("lvr_isbn"=>$isbn));

    
  } 
  

 
	
  
}  ?>