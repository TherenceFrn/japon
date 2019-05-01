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
  $adresseURL = 'index';

  include 'header.php';
  include 'connection.php';

  ?>

  <!-- main -->
  <main class="block-content-body">
    <section class="section-1 section-inscription">

      <div class="container">
        <h2>Inscription</h2>

        <form class="" action="" method="post">

          <div class="input-group mb-3">
            <input name="nom" type="text" class="form-control" placeholder="Nom">
          </div>

          <div class="input-group mb-3">
            <input name="prenom" type="text" class="form-control" placeholder="Prenom">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input name="pseudo" type="text" class="form-control" placeholder="Pseudo">
          </div>

          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="E-Mail">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Confirmez votre e-mail</span>
            </div>
            <input name="email2" type="email" class="form-control" placeholder="E-Mail">
          </div>



          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Mot de passe">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Confirmez votre mot de passe: </span>
            </div>
            <input name="password2" type="password" class="form-control" placeholder="Mot de passe">
          </div>

          <button type="submit" class="btn btn-primary float-right">S'inscrire</button>

        </form>
      </div>

    </section>
  </main>

  <!-- footer -->
  <?php
  include 'footer.php'
  ?>

  <script type="text/javascript" src="script/jquery.js"></script>
  <script type="text/javascript" src="script/script.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
