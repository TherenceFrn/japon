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
    $adresseURL = 'index';

    include 'header.php';
    include 'connection.php';

    ?>

      <!-- main -->
        <main class="block-content-body">
        <section class="section-1 section-discover">
          <div class="div-discover div-discover-1">
              <i class="fas fa-map-marker-alt"></i>
              <div class="block-discover-content block-discover-content-1">
                <p>Nous partageons avec vous les lieux que nous allons visiter sur une carte Google Map</p>
                <h3>Voir la carte</h3>
              </div>
          </div>
          <div class="div-discover div-discover-2">
              <i class="far fa-images"></i>
              <div class="block-discover-content block-discover-content-2">
                <p>Nous partageons avec vous les lieux que nous allons visiter sur une carte Google Map</p>
                <h3>Voir la galerie</h3>
              </div>
          </div>
          <div class="div-discover div-discover-3">
              <i class="far fa-file-alt"></i>
              <div class="block-discover-content block-discover-content-3">
                <p>Nous partageons avec vous les lieux que nous allons visiter sur une carte Google Map</p>
                <h3>Voir les articles</h3>
              </div>
          </div>
        </section>
        <section class="section-2 section-home-articles">
          <div class="section-home-articles-title">
            <h4>Articles sur le Japon</h4>
            <h2>Derniers Articles</h2>
          </div>
          <div class="block-articles-home">


          <?php

          $requete = $connection->query("SELECT * FROM articles ORDER BY id DESC LIMIT 4");

          $requeteresultat = $requete -> fetchAll();

          foreach ($requeteresultat as $key) {
          	?>
            <a href="article.php?id=<?php echo $key -> id;?>">
            <div class="article-home">
                <div class="inner">
                  <p class="home-article-title"><?php echo $key -> titre; ?></p>
                  <p class="home-article-subtitle">Jour #<?php echo $key -> jour; ?> : <?php echo $key -> titre; ?></p>
                </div>
              <div class="block-degrade-article-home">
                <img src="<?php echo 'images/article/'.$key -> image; ?>" alt="">
              </div>
            </div>
            </a>

            <?php
            }
          ?>
            <!-- <div class="article-home">
                <div class="inner">
                  <p class="home-article-title">Les Temples</p>
                  <p class="home-article-subtitle">Jour #15 : Les Temples</p>
                </div>
              <div class="block-degrade-article-home">
                <img src="images/header/header-image.jpg" alt="">
              </div>
            </div>
            <div class="article-home">
                <div class="inner">
                  <p class="home-article-title">Les Temples</p>
                  <p class="home-article-subtitle">Jour #15 : Les Temples</p>
                </div>
              <div class="block-degrade-article-home">
                <img src="images/header/header-image.jpg" alt="">
              </div>
            </div> -->
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
