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
    $adresseURL = 'index';

    include 'header.php';
    include 'connection.php';

    if(!isset($_SESSION['id'])){
      header('Location:connexion.php');

        if($_SESSION['email'] != 'test@test.test'){

        header('Location: index.php');
      }
    }

    if(isset($_POST['validArticle']) AND isset($_SESSION['id'])){

      if(!empty($_POST['titre']) AND !empty($_POST['jour']) AND !empty($_POST['resume']) AND !empty($_POST['contenu'])){

        $titre= htmlspecialchars($_POST['titre']);
        $datearticle = date("Y-m-d H:i:s");
        $auteur = $_SESSION['id'];
        $jour = intval($_POST['jour']);
        $avatar = "1.jpg";
        $contenu = htmlspecialchars($_POST['contenu']);
        $extrait = htmlspecialchars($_POST['resume']);

        $titre_l = strlen($titre);

        if($titre_l <= 255){

                    

          $requeteArticle = $connection->prepare('INSERT INTO articles(titre, datearticle, id_auteur, jour, avatar, contenu, extrait) VALUES(?,?,?,?,?,?,?)');
          $requeteArticle->execute(array(
            $titre,
            $datearticle,
            $auteur,
            $jour,
            $avatar,
            $contenu,
            $extrait
          ));

          $lastid = $connection->lastInsertId();


          // if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
            
          //   if(exif_imagetype($_FILES['avatar']['tmp_name']) == 1 OR exif_imagetype($_FILES['avatar']['tmp_name']) == 2 OR exif_imagetype($_FILES['avatar']['tmp_name']) == 3 OR exif_imagetype($_FILES['avatar']['tmp_name']) == 18){
              
          //     $extentionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));            
              
          //     $chemin = 'images/article/'.$lastid.'.'.$extentionUpload;

          //     $avatarPath = $lastid.'.'.$extentionUpload;

          //     move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

          //     $requeteAvatar = $connection->prepare('UPDATE articles SET avatar = ? WHERE id=?');
          //     $requeteAvatar->execute(array(
          //       $avatarPath,
          //       $lastid
          //     ));
              
          //   }

          // }// fin add image

          if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
          $tailleMax = 2097152;
          $extensionValides = array('jpg','png','jpeg','gif');
            if($_FILES['avatar']['size'] <= $tailleMax){
                $extentionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                  if(in_array($extentionUpload, $extensionValides)){
                      $chemin = 'images/article/'.$_SESSION['id'].'.'.$extentionUpload;
                      $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
                      if($resultat){

                          $requeteAvatar= $connection->prepare('UPDATE articles SET avatar=:avatar WHERE id=:id');
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

        }
        
      }
    }

    ?>

      <!-- main -->
        <main class="block-content-body">
        <section class="section-1" style="padding: 50px 0;">

          <div class="container">
          <h2>Nouvel Article</h2>

          <form class="" action="" method="post" enctype='multipart/form-data' >

            <div class="input-group mb-3">
              <input name="titre" type="text" class="form-control" placeholder="Nom de l'article">
            </div>

            <div class="input-group mb-3">
              <select class="form-control" name="jour">
                  <?php for ($i=-2; $i < 30; $i++) {
                    ?> <option value="<?php echo $i; ?> ">Jour #<?php echo $i; ?></option> <?php
                  } ?>
              </select>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Image de l'article</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="avatar">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>

            <div class="input-group mb-3">
              <textarea name="resume" class="form-control" placeholder="Résumé de l'article" style="min-height:100px;max-height:200px"></textarea>
            </div>

            <div class="form-control liste-control-text">
              <div class="liste-control-text-element">
                <span class="editor-titre-h2"><i class="fas fa-heading"></i>2</span>
                <span class="editor-titre-h3"><i class="fas fa-heading"></i>3</span>
                <span class="editor-paragraph"><i class="fas fa-align-left"></i></span>
              </div>

              <div class="liste-control-text-element">
                <span class="editor-bold"><i class="fas fa-bold"></i></span>
                <span class="editor-underline"><i class="fas fa-underline"></i></span>
              </div>

              <div class="liste-control-text-element">
                <span class="editor-image"><i class="fas fa-image"></i></span>
                <span class="editor-link"><i class="fas fa-link"></i></span>
              </div>
            </div>

            <div class="input-group mb-3">
              <textarea name="contenu" class="form-control editor-contenu-article" placeholder="Contenu de l'article" style="min-height:500px"></textarea>
            </div>

            <button type="submit" name="validArticle" class="btn btn-primary float-right">Ajouter l'article</button>
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
