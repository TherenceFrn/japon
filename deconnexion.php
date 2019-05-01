<?php

session_start();
setcookie('mail', '',time()-3600);
setcookie('password', '',time()-3600);
$_SESSION = array();
session_destroy();
header('Location: connexion.php');
 ?>
