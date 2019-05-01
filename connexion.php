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
  $adresseURL = 'connexion';

  include 'header.php';
  include 'connection.php';


  if(isset($_SESSION['id'])){

    header('Location: profil.php?id='.$_SESSION['id']);
  }

  if(isset($_POST['validConnexion'])){

    $emailCo = htmlspecialchars($_POST['emailCo']);
    $passwordCo = sha1($_POST['passwordCo']);

      if(!empty($emailCo) AND !empty($passwordCo)){

          $requser = $connection->prepare('SELECT * FROM membres WHERE mail=? AND motdepasse=?');
          $requser->execute(array($emailCo,$passwordCo));

          $userRowCount = $requser->rowCount();

            if($userRowCount == 1){

              if(isset($_POST['stayLogged'])){
                  setcookie('mail', $emailCo, time()+365*24*3600,null,null,false,true);
                  setcookie('password', $passwordCo, time()+365*24*3600,null,null,false,true);

              }

              $userinfo = $requser->fetch();
              $_SESSION['id'] = $userinfo-> id;
              $_SESSION['nom'] = $userinfo-> nom;
              $_SESSION['prenom'] = $userinfo-> prenom;
              $_SESSION['pseudo'] = $userinfo-> pseudo;
              $_SESSION['email'] = $userinfo-> mail;

              header('Location: profil.php?id='.$_SESSION['id']);
            }else{

              $e = 'Mauvais identifiants';
            }

      }else{

        $e = 'Veuillez remplir les champs';
      }
  }


  ?>

  <!-- main -->
  <main class="block-content-body">
    <section class="section-1 section-inscription">

      <div class="container">



        <h2>Connexion</h2>

        <form action="" method="post">

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Entrez votre e-mail</span>
              </div>
              <input name="emailCo" type="email" class="form-control" placeholder="E-Mail">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Entrez votre mot de passe: </span>
              </div>
              <input name="passwordCo" type="password" class="form-control" placeholder="Mot de passe">
            </div>

            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="stayLogged" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1" style="color: white;">Rester connecté ?</label>
            </div>
          <button type="submit" name="validConnexion" class="btn btn-primary float-right">Se connecter</button>

        </form>
        <hr>
        <h3>Pas encore inscrit ?</h3>
          <a href="inscription.php">
            <button type="" name="" class="btn btn-primary float-right">
            S'inscrire
            </button>
          </a>
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
