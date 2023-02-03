<!-- si la session utilisateur n'est pas definie on redirige vers la page d'inscription -->
<!-- si la session utilisateur est définie, si le formulaire d'ajout commentaire est envoyer, alors on envoi une requete à la base de donnée pour insérer un commentaire -->
<?php
session_start();
if(isset($_SESSION['utilisateur'])){
	


if (isset($_POST['commenter'])) {

	$utilisateur=$_SESSION['utilisateur'];
	$commentaire=$_POST['commentaire'];
	$idlivre=$_POST['isbn'];
	
 
	if ($commentaire && $idlivre) {
		
		$connect=mysqli_connect('localhost','root','','porjetweb') or die('Erreur de connexion à la base de données');

	$query= mysqli_query($connect,"INSERT INTO commentaire(nomUtilisateur,message,idlivre) VALUES('$utilisateur','$commentaire','$idlivre')");

	header('Location:../?page='.$_POST['valuePage']);

		}
			else{
		echo "<h3 style='color: red;'>Une erreur c'est produite!";
	}
}
}else{
	header('Location:../?page=signIn');

}
?>