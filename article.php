<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Japon</title>
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
                <h3><?php echo $articleInfo -> titre; ?></h3>
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
