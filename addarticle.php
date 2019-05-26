<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Japon</title>
   <?php include 'head.php'; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <?php

    // permet de savoir sur quel page on est
    $adresseURL = 'index';

    include 'header.php';
    include 'connection.php';

    if(isset($_POST['validArticle']) AND isset($_SESSION['id'])){

      $titre= htmlspecialchars($_POST['nom']);
      $jour = intval($_POST['jour']);
      $resume = htmlspecialchars($_POST['resume']);
      $contenu = htmlspecialchars($_POST['contenu']);

      if(!empty($_POST['nom']) AND !empty($_POST['jour']) AND !empty($_POST['resume']) AND !empty($_POST['contenu'])){


        $titre_l = strlen($titre);

        if($titre_l <= 255){

            if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){

          $tailleMax = 2097152;
          $extensionValides = array('jpg','png','jpeg','gif');

            if($_FILES['avatar']['size'] <= $tailleMax){

                $extentionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));

                  if(in_array($extentionUpload, $extensionValides)){

                      $chemin = 'images/article/'.$_SESSION['id'].'.'.$extentionUpload;
                      $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
                      if($resultat){

                            $datearticle = date("Y-m-d H:i:s");
                              
                            $requeteArticle = $connection->prepare('INSERT INTO articles(titre, datearticle, id_auteur, jour, avatar, contenu, extrait) VALUES(?,?,?,?,?,?,?)');
                            $requeteArticle->execute(array(
                              $titre,
                              $datearticle,
                              $_SESSION['id'],
                              $jour,
                              '1.jpg',
                              $contenu,
                              $resume
                            ));

                            $prereqIm = $connection->prepare("SELECT * FROM articles ORDER BY id DESC LIMIT 1");
                            $prereqIm->execute();
                            $infosim = $prereqIm->fetchAll();

                            foreach($infosim as $keyIm){
                              $avatarLink = $keyIm->id.'.'.$extentionUpload;
                              $idAvatar = $keyIm->id;

                              $requeteAvatar= $connection->prepare('UPDATE articles SET avatar=:avatar WHERE id=:id');
                              $requeteAvatar->execute(array(
                              $avatarLink,
                              'id' => $_SESSION['id'],
                              'avatar' => $idAvatar
                              ));

                            }


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

          <form class="" action="" method="post">

            <div class="input-group mb-3">
              <input name="nom" type="text" class="form-control" placeholder="Nom de l'article">
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

            <div class="input-group mb-3">
              <textarea name="contenu" class="form-control" placeholder="Contenu de l'article" style="min-height:500px"></textarea>
            </div>

            <button type="submit" name="validArticle" class="btn btn-primary float-right">S'inscrire</button>
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
