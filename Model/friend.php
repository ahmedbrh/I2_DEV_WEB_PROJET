<?php
require_once("database.php");
class Friend extends Database{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->getConnection();
    }

  public function get_not_accepted_friend($username) {
    $sql = "select usr.usr_nom,usr.usr_id
from users usr
where usr.usr_id = (
	select usrf.usr_id_1
	from user_friend usrf
	inner join users usr on usrf.usr_id_2 = usr.usr_id
	where usrf.friend_accepted = false
	and usr.usr_nom = :user)";
    return $this->select($sql, ["user" => $username]);
  }

  public function get_friend($username) {
    $sql = "select usr.usr_nom
from users usr
where usr.usr_id = (
	select usrf.usr_id_1
	from user_friend usrf
	inner join users usr on usrf.usr_id_2 = usr.usr_id
	where usrf.friend_accepted = true
	and usr.usr_nom = :user
)";
    return $this->select($sql, ["user" => $username]);
  }

  public function accept_friend($user_id){
     $sql = "UPDATE user_friend SET friend_accepted = true WHERE usr_id_1 = :friend_id";
      $this->update($sql, ["friend_id" => $user_id]);
  }
  public function refuse_friend($user_id){
     $sql = "DELETE from user_friend WHERE usr_id_1 = :friend_id";
      $this->delete($sql, ["friend_id" => $user_id]);
  }

  public function add_friend_request($usr1, $usr2) {
    $sql = "INSERT INTO public.user_friend
        (usr_id_1, usr_id_2, friend_accepted)
        VALUES(:usr1, :usr2, false);";
    $this->insert($sql, ["usr1" => $usr1, "usr2" => $usr2]);
  }

  public function request_already_exist($usr1, $usr2) {
    $sql = "select *
from user_friend uf
where (uf.usr_id_1 = :usr1 and uf.usr_id_2 = :usr2)
or (uf.usr_id_1 = :usr2 and uf.usr_id_2 = :usr1);";

    $this->select($sql, ["usr1" => $usr1, "usr2" => $usr2]);
  }
  
}
                                                                                     
?>