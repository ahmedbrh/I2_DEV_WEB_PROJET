<!-- inscription classique -->
<?php
require "./user.php";

if (isset($_POST['inscription'])) {
	$name=$_POST['name'];
	$adressemail=$_POST['email2'];
	$motdepasse=$_POST['password2'];
	$motdepasseconf=$_POST['passwordconf'];

	if ($name && $adressemail && $motdepasseconf==$motdepasse) {
    $cost = 12; 
    $salt = getenv('salt');
    $motdepasse = password_hash($motdepasse . $salt, PASSWORD_BCRYPT, ['cost' => $cost]);

    $user = new User();
    $user->create_user($adressemail, $motdepasse, $name);

		}
			else{
		echo "<h3 style='color: red;'>Bien vouloir remplir tous les champs!";
	     }
}
