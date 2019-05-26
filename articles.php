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
    $adresseURL = 'articles';

    include 'header.php';
    include 'connection.php';

    ?>

      <!-- main -->
        <main class="block-content-body">
        <section class="section-1 section-articles">

          <!-- <div class="div-articles">
            <div class="articles-image">
              <img class="" src="images/header/header-image.jpg" alt="" />
            </div>
            <div class="articles-content">
              <h3>Les Temples</h3>
              <div class="articles-infos">
                <i class="far fa-calendar-alt"></i>
                <p>2019-02-05</p>
                <i class="fas fa-user-alt"></i>
                <p>Thérence</p>
                <i class="far fa-comment"></i>
                <p>7 Commentaires</p>
                <i class="fas fa-tasks"></i>
                <p>Jour 11</p>
              </div>
              <div class="articles-resume">
                Début de l'article, eh oui il est fort intéressant de pouvoir lire le début de chaque article, car cela permet à l'utilisateur de savoir ce qu'il va pouvoir y découvrir
              </div>
            </div>
            <div class="articles-lire-plus">
              Lire l'article
            </div>
          </div> -->

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
