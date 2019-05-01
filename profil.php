<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Japon</title>
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/gidole-regular" type="text/css"/>
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/style.css" type="text/css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
  <?php

  // permet de savoir sur quel page on est
  $adresseURL = 'profil';

  include 'header.php';
  include 'connection.php';

  if(isset($_GET['id']) AND $_GET['id'] > 0){

    $getid = intval($_GET['id']);

    $requser = $connection->prepare('SELECT * FROM membres WHERE id=?');
    $requser->execute(array($getid));

    $userinfo = $requser->fetch();
  }else{

    header('Location: connexion.php');
  }
  ?>

  <!-- main -->
  <main class="block-content-body">
    <section class="section-1 section-inscription">

      <div class="container">
        <h2>Profil</h2>
        <h3><?php echo $userinfo-> nom.' '; echo $userinfo-> prenom;?></h3>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><h5>Nom Prenom : </h5><?php echo $userinfo-> nom.' '; echo $userinfo-> prenom;?></h4>
            <p class="card-text"><h5>Pseudo : </h5><?php echo $userinfo-> pseudo;?></p>
            <p class="card-text"><h5>e-Mail : </h5><?php echo $userinfo-> mail;?></p>
            <p class="card-text"><h5>Numéro d'utilisateur : </h5><?php echo $userinfo-> id;?></p>

            <?php if($userinfo->id == $_SESSION['id']){
                ?>
                <a href="#" class="card-link">Mes commentaires</a>
                <a href="#" class="card-link">Créer un article</a>
                <?php
              } ?>
          </div>
        </div>
      </div>

    </section>
  </main>

  <!-- footer -->
  <?php
  include 'footer.php';

  ?>
  <!-- other -->
  <?php

  if(isset($e)){

    ?>
    <script type="text/javascript">
        console.log('Erreur : '+'<?php echo $e; ?>');
    </script>
  <?php
  }

  ?>


  <script type="text/javascript" src="script/jquery.js"></script>
  <script type="text/javascript" src="script/script.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
