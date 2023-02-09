<?php
	class DataBase
	{
		//Connexion à la base de données
		private $conn;
		
		function __construct()
		{
			$this->conn = new PDO('mysql:host=localhost;dbname=test','root','');
		}

		function requete($sql, $params)
		{
			$req = $this->conn->prepare($sql);
			/*$keys = array_keys($params);
			foreach($keys as $val)
			{	
				$req->bindParam($val, $params[$val]);
			}
			$req->execute();*/
			$req->execute($params);
			return $req->fetchAll(PDO::FETCH_ASSOC);
			
		}
	}		