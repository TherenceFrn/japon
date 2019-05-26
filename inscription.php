<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Japon</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <?php include 'head.php'; ?>
</head>
<body>
  <?php

  // permet de savoir sur quel page on est
  $adresseURL = 'inscription';
  include 'header.php';
  include 'connection.php';


  if(isset($_SESSION['id'])){

    header('Location: profil.php?id='.$_SESSION['id']);
  }

  if(isset($_POST['validInscription'])){

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $email2 = htmlspecialchars($_POST['email2']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);

    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['password']) AND !empty($_POST['password2'])){



        $pseudo_l = strlen($pseudo);
        $nom_l = strlen($nom);
        $prenom_l = strlen($prenom);
        $email_l = strlen($email);
        $email2_l = strlen($email2);

        if($pseudo_l <= 255 AND $nom_l <= 255 AND $prenom_l <= 255 AND $email_l <= 255 AND $email2_l <= 255){


          if ($email == $email2) {

            if(filter_var($email,FILTER_VALIDATE_EMAIL)){

            $reqmail = $connection->prepare('SELECT * FROM membres WHERE mail=?');
            $reqmail->execute(array($email));
            $mailexist = $reqmail->rowCount();

                  if($mailexist == 0){



                              if ($password == $password2) {

                                            $avatar = 'avatar.gif';

                                            $requeteMembres = $connection->prepare('INSERT INTO membres(pseudo, mail, nom, prenom, motdepasse, avatar) VALUES(?,?,?,?,?,?)');
                                            $requeteMembres->execute(array(
                                              $pseudo,
                                              $email,
                                              $nom,
                                              $prenom,
                                              $password,
                                              $avatar
                                            ));

                                            header('Location : connexion.php');

                                      }else{

                                        $e = 'Les mots de passes ne correspondent pas';
                                      }

                          }else{

                            $e = 'Un compte existe déjà avec cette adersse mail';
                          }

                    }else{

                      $e = 'Votre adresse mail n\'est pas valide';

                      }

                  }else{

                    $e = 'Les adresses email ne correspondent pas';
                  }

        }else{

          $e = 'Les champs ne doivent pas dépasser 255 caractères';
        }

    }else{

      $e = 'Veuillez remplir tous les champs';
    }
  }

  ?>

  <!-- main -->
  <main class="block-content-body">
    <section class="section-1 section-inscription">

      <div class="container">
        <h2>Inscription</h2>

        <form class="" action="" method="post">

          <div class="input-group mb-3">
            <input name="nom" type="text" class="form-control" placeholder="Nom" value="<?php if(isset($nom)){ echo $nom;} ?>">
          </div>

          <div class="input-group mb-3">
            <input name="prenom" type="text" class="form-control" placeholder="Prenom" value="<?php if(isset($prenom)){ echo $prenom;} ?>">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input name="pseudo" type="text" class="form-control" placeholder="Pseudo" value="<?php if(isset($pseudo)){ echo $pseudo;} ?>">
          </div>

          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="E-Mail" value="<?php if(isset($email)){ echo $email;} ?>">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Confirmez votre e-mail</span>
            </div>
            <input name="email2" type="email" class="form-control" placeholder="E-Mail"  value="<?php if(isset($email2)){ echo $email2;} ?>">
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

          <button type="submit" name="validInscription" class="btn btn-primary float-right">S'inscrire</button>

        </form>

        <hr>
        <h3>Vous avez déjà un compte ?</h3>
          <a href="connexion.php">
            <button type="" name="" class="btn btn-primary float-right">
            Se connecter
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
