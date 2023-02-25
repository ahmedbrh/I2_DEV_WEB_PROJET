<!-- connexion à base de donnée classique -->
<?php 
require "./user.php";

if (isset($_POST['connexion'])) {
	
	$email=$_POST['email1'];
	$password=$_POST['password1'];
  
	if($email&&$password){

	$user = new User();
  $user = $user->get_user($email);
	if (count($user)==1) {
    $salt = getenv('salt');
    if (password_verify($password.$salt, $user[0]["usr_password"])) {
        echo "Password is valid!";
    } else {
        echo "Invalid password.";
    }
				
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