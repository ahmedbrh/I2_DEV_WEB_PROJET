
<!-- détruit la session pour permettre une deconnexion, elle sera executé lors du clic dans le bouton deconnexion -->

<?php
session_start();
session_destroy();
header('Location:../index.php');
exit;
?>