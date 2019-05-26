<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Japon</title>
   
    <?php include 'head.php'; ?>

  </head>
  <body>
    <?php

    // permet de savoir sur quel page on est
    $adresseURL = 'article';

    include 'header.php';
    include 'connection.php';

    ?>

      <!-- main -->
        <main class="block-content-body">
        <section class="section-1 section-article">

          <?php

          $getid = $_GET['id'];

          $requete = $connection->prepare('SELECT * FROM articles WHERE id=?');
          $requete->execute(array($getid));
          $articleInfo = $requete->fetch();

        
          	?>

            <div class="div-article">

              <div class="article-image">
                <a href="article.php?id=<?php echo $articleInfo -> id;?>">
                  <img class="" src="<?php echo 'images/article/'.$articleInfo -> image; ?>" alt="" />
                </a>
              </div>
              
              <div class="article-content">
                <h2><?php echo $articleInfo -> titre; ?></h2>
                <div class="article-infos">
                  <i class="far fa-calendar-alt"></i>
                  <p><?php echo $articleInfo -> datearticle; ?></p>
                  <i class="fas fa-user-alt"></i>
                  <p><?php echo $articleInfo -> auteur; ?></p>
                  <i class="far fa-comment"></i>
                  <p>7 Commentaires</p>
                  <i class="fas fa-tasks"></i>
                  <p>Jour <?php echo $articleInfo -> jour; ?></p>
                </div>
              </div>

              <div class="article-contenu">
              <?php echo $articleInfo -> contenu; ?>
              </div>

            </div>




        </section>
      </main>

      <!-- footer -->
      <?php

      include 'footer.php'

      ?>

    <script type="text/javascript" src="script/jquery.js"></script>
    <script type="text/javascript" src="script/script.js"></script>
  </body>
</html>
