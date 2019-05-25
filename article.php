<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Japon</title>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/gidole-regular" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

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

          $requete = $connection->query("SELECT * FROM articles ORDER BY id DESC");

          $requeteresultat = $requete -> fetchAll();

          foreach ($requeteresultat as $key) {
          	?>

            <div class="div-articles">
              <div class="articles-image">
                <a href="article.php?id=<?php echo $key -> id;?>">
                  <img class="" src="<?php echo 'images/article/'.$key -> image; ?>" alt="" />
                </a>
              </div>
              <div class="articles-content">
                <h3><?php echo $key -> titre; ?></h3>
                <div class="articles-infos">
                  <i class="far fa-calendar-alt"></i>
                  <p><?php echo $key -> datearticle; ?></p>
                  <i class="fas fa-user-alt"></i>
                  <p><?php echo $key -> auteur; ?></p>
                  <i class="far fa-comment"></i>
                  <p>7 Commentaires</p>
                  <i class="fas fa-tasks"></i>
                  <p>Jour <?php echo $key -> jour; ?></p>
                </div>
                <div class="articles-resume">
                  <?php echo $key -> resume; ?>
                </div>
              </div>
              <a href="article.php?id=<?php echo $key -> id;?>">
                <div class="articles-lire-plus">
                  Lire l'article
                </div>
              </a>
            </div>


            <?php
            }
          ?>

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
