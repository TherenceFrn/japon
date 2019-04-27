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
    $adresseURL = 'articles';

    include 'header.php';

    ?>

      <!-- main -->
        <main class="block-content-body">
        <section class="section-1 section-articles">


          <div class="div-articles">
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
          </div>


          <div class="div-articles">
            <div class="articles-image">
              <img class="" src="#" alt="" />
            </div>
            <div class="articles-content">
              <h3>Les Temples</h3>
              <div class="articles-infos">
                <i class="far fa-calendar-alt"></i>
                <p>2019-02-05</p>
                <i class="fas fa-user-alt"></i>
                <p>Thérence</p>
                <i class="far fa-comment"></i>
                <p> Commentaires</p>
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
