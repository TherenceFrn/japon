<?php
if(!isset($_SESSION['id']) AND isset($_COOKIE['mail'],$_COOKIE['password']) AND !empty($_COOKIE['mail']) AND !empty($_COOKIE['password'])){

  $requser = $connection->prepare('SELECT * FROM membres WHERE mail=? AND motdepasse=?');
  $requser->execute(array($_COOKIE['mail'],$_COOKIE['password']));

  $userRowCount = $requser->rowCount();

    if($userRowCount == 1){

      $userinfo = $requser->fetch();
      $_SESSION['id'] = $userinfo-> id;
      $_SESSION['nom'] = $userinfo-> nom;
      $_SESSION['prenom'] = $userinfo-> prenom;
      $_SESSION['pseudo'] = $userinfo-> pseudo;
      $_SESSION['email'] = $userinfo-> mail;
    }
}

?>
