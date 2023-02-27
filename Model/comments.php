<?php
require_once("database.php");
class Commentaire extends Database{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->getConnection();
    }
  
  public function create_reply($cmt_description, $usr_id, $lvr_id){
    $sql = "INSERT INTO users_comments(usr_id,lvr_id,cmt_date,cmt_description,cmt_note) VALUES(:usr_id,:lvr_id,:cmt_date,:cmt_description,'1')";
    $params = array(
      "usr_id"=>$usr_id,
      "lvr_id"=>$lvr_id,
      "cmt_date"=>date("Y-m-d h:i:sa"),
      "cmt_description"=>$cmt_description
    );
    $this->insert($sql, $params);
  }
  public function get_book_replies($isbn){
    //replies = array();
    $livres = $this->select("SELECT lvr_id from livre WHERE livre.lvr_isbn = :lvr_isbn", array("lvr_isbn"=>$isbn));
    if(count($livres)>0){
      $livre = $livres[0];
      return $this->select("SELECT * from users_comments WHERE users_comments.lvr_id=:lvr_id",array("lvr_id"=>$livre["lvr_id"]));
    }

    return null;
  } 
  

 
	
  
}  ?>