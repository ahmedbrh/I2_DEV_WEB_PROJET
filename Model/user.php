<?php
require_once("database.php");
class User extends Database
{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->getConnection();
    }

    public function create_user($adressemail, $motdepasse, $name)
    {
        $salt = getenv('salt');
        $motdepasse = password_hash($motdepasse . $salt, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(usr_mail,usr_password,usr_nom) VALUES(:mail, :motdepasse, :name)";
        $this->insert($sql, ['mail' => $adressemail, 'motdepasse' => $motdepasse, 'name' => $name]);
        return $name;
    }

    public function get_user($adressemail)
    {
        $sql = "SELECT * from users where usr_mail=:mail";
        return $this->select($sql, ['mail' => $adressemail]);
    }

    public function get_user_by_id($id){
        $sql = "SELECT * from users where usr_id=:usr_id";
        return $this->select($sql, ['usr_id' => intval($id)]);
    }

    public function get_username_by_id($id){
      $users = $this->get_user_by_id($id);
      if(count($users)>0){
        
        return $users[0]["usr_nom"];
      }
      return "anonymous";
    }

      public function get_user_by_username($username){
        $sql = "SELECT * from users where usr_nom=:usr_nom";
        $users= $this->select($sql, ['usr_nom' => $username]);
        return count($users)>0 ? $users[0] : null;
    }

    public function connect_user($mail, $pass)
    {
        $error = False;
        $user = $this->get_user($mail);
        if (count($user) == 1) {
            $salt = getenv('salt');
            if (password_verify($pass . $salt, $user[0]["usr_password"])) {
            } else {
                $error = True;
                echo "<div class='alert alert-danger' role='alert'>Le couple identifiant mot de passe est invalide !</div>";
            }

            if (!$error) {
                return $user[0]["usr_nom"];
            } else {
                return null;
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Le couple identifiant mot de passe est invalide !</div>";
        }
    }
}
