<?php
require "database.php";
class User extends Database{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->getConnection();
    }
  
  public function create_user($adressemail, $motdepasse, $name){
    $salt = getenv('salt');
    $motdepasse = password_hash($motdepasse . $salt, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(usr_mail,usr_password,usr_nom) VALUES('$adressemail','$motdepasse','$name')";
    $this->insert($sql);
  }

  public function get_user($adressemail) {
    $sql = "SELECT * from users where usr_mail='".$adressemail."'"; //ptdrr qui a ecris ca, c'est une faille sql pure et dure -youness
    return $this->select($sql);
  }

  public function connect_user($mail, $pass){
    $error = False;
    $user = $this->get_user($mail);
    if (count($user)==1) {
      $salt = getenv('salt');
      if (password_verify($pass.$salt, $user[0]["usr_password"])) {
          echo "Password is valid!";
      } else {
          $error=True;
          echo "Invalid password.";
      }
				

	   //session_start();
		//$_SESSION['utilisateur']=$result;
		//header('Location:../index.php');	
		return !$error;
	}
    //if($error==False){
      //session_start();
      //$_SESSION["sessID"] = session_id();
    //}
  }
}