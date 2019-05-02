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
  <?php

  include 'favicon.php';
  ?>
</head>
<body>
  <?php

  // permet de savoir sur quel page on est
  $adresseURL = 'profil';

  include 'header.php';
  include 'connection.php';

  if(isset($_SESSION['id'])){

    $requser = $connection->prepare('SELECT * FROM membres WHERE id=?');
    $requser->execute(array($_SESSION['id']));

    $userinfo = $requser->fetch();


    if(isset($_POST['validUpdate'])){

      // PSEUDO

        if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $_SESSION['pseudo']){

          $newpseudo = htmlspecialchars($_POST['newpseudo']);
          $updatepseudo = $connection->prepare('UPDATE membres SET pseudo=? WHERE id=?');
          $updatepseudo->execute(array(
                                        $newpseudo,
                                        $_SESSION['id']
          ));
        }
        if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $_SESSION['email']){

          if($_POST['newmail'] == $_POST['newmail2']){

            $reqmail = $connection->prepare('SELECT * FROM membres WHERE mail=?');
            $reqmail->execute(array($_POST['newmail']));
            $mailexist = $reqmail->rowCount();

              if($mailexist == 0 ){

                  $newmail = htmlspecialchars($_POST['newmail']);
                  $updatemail = $connection->prepare('UPDATE membres SET mail=? WHERE id=?');
                  $updatemail->execute(array(
                                                $newmail,
                                                $_SESSION['id']
                  ));
              }
          }

        }
        if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $_SESSION['nom']){

          $newnom = htmlspecialchars($_POST['newnom']);
          $updatenom = $connection->prepare('UPDATE membres SET nom=? WHERE id=?');
          $updatenom->execute(array(
                                        $newnom,
                                        $_SESSION['id']
          ));
        }
        if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $_SESSION['prenom']){

          $newprenom = htmlspecialchars($_POST['newprenom']);
          $updateprenom = $connection->prepare('UPDATE membres SET prenom=? WHERE id=?');
          $updateprenom->execute(array(
                                        $newprenom,
                                        $_SESSION['id']
          ));
        }
        if(isset($_POST['newpassword']) AND !empty($_POST['newpassword']) AND isset($_POST['newpassword2']) AND !empty($_POST['newpassword2'])){

          if($_POST['newpassword'] == $_POST['newpassword2']){

            $newmdp = sha1($_POST['newpassword']);
            $updatmdp = $connection->prepare('UPDATE membres SET motdepasse=? WHERE id=?');
            $updatmdp->execute(array(
                                          $newmdp,
                                          $_SESSION['id']
            ));
          }

        }

        if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){

          $tailleMax = 2097152;
          $extensionValides = array('jpg','png','jpeg','gif');

            if($_FILES['avatar']['size'] <= $tailleMax){

                $extentionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));

                  if(in_array($extentionUpload, $extensionValides)){

                      $chemin = 'images/avatar/'.$_SESSION['id'].'.'.$extentionUpload;
                      $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
                      if($resultat){

                          $requeteAvatar= $connection->prepare('UPDATE membres SET avatar=:avatar WHERE id=:id');
                          $requeteAvatar->execute(array(
                          'avatar' => $_SESSION['id'].'.'.$extentionUpload,
                          'id' => $_SESSION['id']
                          ));

                      }else{

                        $e = 'Erreur importation fichier';
                      }

                  }else{

                    $e = 'Format non pris en compte ( jpeg, jpg, png ou gif seulement)';
                  }

            }else{

              $e = 'Fichiers trop volumineux ( 2 Mo max )';
            }
        }

          header('Location: profil.php?id='.$_SESSION['id']);
    }

  }else{

    header('Location: connexion.php');
  }
  ?>

  <!-- main -->
  <main class="block-content-body">
    <section class="section-1 section-inscription">

      <div class="container">

        <div class="alert alert-primary alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Attention !</strong> si vous ne souhaitez pas modifier un champ ne changez pas sa valeur
        </div>
        <h2>Profil</h2>
        <form action="" method="post" enctype="multipart/form-data">

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><?php echo $userinfo-> pseudo; ?></span>
              </div>
              <input name="newpseudo" type="text" class="form-control" placeholder="Nouveau pseudo" value="<?php echo $userinfo-> pseudo; ?>">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><?php echo $userinfo-> nom; ?></span>
              </div>
              <input name="newnom" type="text" class="form-control" placeholder="Nouveau nom" value="<?php echo $userinfo-> nom; ?>">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><?php echo $userinfo-> prenom; ?></span>
              </div>
              <input name="newprenom" type="text" class="form-control" placeholder="Nouveau prénom" value="<?php echo $userinfo-> prenom; ?>">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><?php echo $userinfo-> mail; ?></span>
              </div>
              <input name="newmail" type="email" class="form-control" placeholder="Nouvel e-Mail" value="<?php echo $userinfo-> mail; ?>">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><?php echo $userinfo-> mail; ?></span>
              </div>
              <input name="newmail2" type="email" class="form-control" placeholder="Confirmation nouvel e-Mail">
            </div>

            <div class="input-group mb-3">
              <input name="newpassword" type="password" class="form-control" placeholder="Nouveau mot de passe">
            </div>

            <div class="input-group mb-3">
              <input name="newpassword2" type="password" class="form-control" placeholder="Confirmation du nouveau mot de passe">
            </div>


            <div class="input-group" style="align-items: end !important;">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01"><img src="images/avatar/<?php echo $userinfo-> avatar; ?>" class="rounded img-thumbnail" alt="avatar" width="200px" height="200px"></span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="avatar">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
          <br>
          <button type="submit" name="validUpdate" class="btn btn-primary float-right">Enregistrer mes informations</button>

        </form>
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
