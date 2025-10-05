<?php

session_start();

//récupère toutes les sessions
$_SESSION = array();

//les détruit
session_destroy();

//redirection vers la page de connexion
header('Location: index.php');
exit;

?>