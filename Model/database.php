<?php
abstract class Database{
    // Informations de la base de données

    // Propriété qui contiendra l'instance de la connexion
    protected static $_connexion = null;

    /**
     * Fonction d'initialisation de la base de données
     *
     * @return void
     */
    protected function getConnection(){
      if(self::$_connexion==null){
        $host = getenv('host');
      $port = getenv('port');
      $dbname = getenv('db');
      $username = getenv('user');
      $password = getenv('password');
      $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$username;password=$password"; 
        // On essaie de se connecter à la base
        try{
            self::$_connexion = new PDO($dsn);
            self::$_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }
      }else{
        return self::$_connexion;
      }
  
  
     
    }

  public function insert($sql, $parametres){ 
    $stmt = self::$_connexion->prepare($sql); 
    // execute the insert statement
    $stmt->execute($parametres);
  
  }
    public function delete($sql, $parametres){ 
    $stmt = self::$_connexion->prepare($sql); 
    // execute the insert statement
    $stmt->execute($parametres);
  
  }
  
  public function update($sql, $parametres){
        $stmt = self::$_connexion->prepare($sql);
        $stmt->execute($parametres);
  }
  public function select($sql, $parametres) {
    $stmt = self::$_connexion->prepare($sql);
    $stmt->execute($parametres);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}