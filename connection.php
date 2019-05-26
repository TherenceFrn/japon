<?php
$connection = new PDO('mysql:host=localhost;dbname=japongithub;charset=utf8', 'root', '', array(

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
  ));

require('cookie.php');

?>

<?php
//$connexion = new PDO('mysql:host=mysql-celbilix.alwaysdata.net;dbname=celbilix_japongithub;charset=utf8', 'celbilix', 'Minecraft49100', array(

//    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
//    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
//  ));
?>  