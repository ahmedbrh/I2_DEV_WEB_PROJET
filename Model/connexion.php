<!-- connexion à base de donnée classique -->
<?php 
session_start();
if (isset($_POST['connexion'])) {
	
	$email=$_POST['email1'];
	$password=$_POST['password1'];

	if($email&&$password){

	$password=md5($password);

	$connect=mysqli_connect('localhost','root','','porjetweb');

	$query= mysqli_query($connect,"SELECT * FROM utilisateur WHERE adresseMail='$email' AND motdepasse='$password'");

	$rows=mysqli_num_rows($query);


	if ($rows==1) {

		$query1= mysqli_query($connect,"SELECT * FROM utilisateur WHERE adresseMail='$email' AND motdepasse='$password'");
				
		while($row = mysqli_fetch_array($query1)){
			$result = $row['nom'];
		}	
	
		$_SESSION['utilisateur']=$result;
		header('Location:../index.php');	
		
	}else{
		$message="Le nom d'utilisateur ou le mot de passe est incorrecte!";
	}

 }else{
 		$message="Veuillez remplir tous les champs!";
 }

}

?>