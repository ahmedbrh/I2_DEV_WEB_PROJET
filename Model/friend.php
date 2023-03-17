<?php
require_once("database.php");
class Friend extends Database{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->getConnection();
    }

  public function get_not_accepted_friend($username) {
    $sql = "select usr.usr_nom
from users usr
where usr.usr_id = (
	select usrf.usr_id_1
	from user_friend usrf
	inner join users usr on usrf.usr_id_2 = usr.usr_id
	where usrf.friend_accepted = false
	and usr.usr_nom = :user
)";
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
}  ?>