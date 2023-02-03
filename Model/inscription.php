<!-- inscription classique -->
<?php
session_start();

if (isset($_POST['inscription'])) {
	$name=$_POST['name'];
	$adressemail=$_POST['email2'];
	$motdepasse=$_POST['password2'];
	$motdepasseconf=$_POST['passwordconf'];

	if ($name && $adressemail && $motdepasseconf==$motdepasse) {
		$motdepasse=md5($motdepasse);
		$connect=mysqli_connect('localhost','root','','porjetweb') or die('Erreur de connexion à la base de données');

	$query= mysqli_query($connect,"INSERT INTO utilisateur(adressemail,motdepasse,nom) VALUES('$adressemail','$motdepasse','$name')");
	header('Location:../?page=accueil');

		}
			else{
		echo "<h3 style='color: red;'>Bien vouloir remplir tous les champs!";
	}
}

?>