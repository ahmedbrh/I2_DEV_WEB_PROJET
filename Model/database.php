<?php
abstract class Database{
    // Informations de la base de données

    // Propriété qui contiendra l'instance de la connexion
    protected $_connexion;

    /**
     * Fonction d'initialisation de la base de données
     *
     * @return void
     */
    protected function getConnection(){
      $host = getenv('host');
      $port = getenv('port');
      $dbname = getenv('db');
      $username = getenv('user');
      $password = getenv('password');
      $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$username;password=$password";
  
      // On supprime la connexion précédente
      $this->_connexion = null;
  
      // On essaie de se connecter à la base
      try{
          $this->_connexion = new PDO($dsn);
          $this->_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $exception){
          echo "Erreur de connexion : " . $exception->getMessage();
      }
    }

  public function insert($sql){
    $stmt = $this->_connexion->prepare($sql);
    // execute the insert statement
    $stmt->execute();
  }

  public function select($sql) {
    $stmt = $this->_connexion->prepare($sql);
    // execute the select statement
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}