<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Japon</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <?php include 'head.php'; ?>
  </head>
  <body>

   <div class="modale-image" style="display: none;">
      <figure>
          <img src="' + varImage+'" alt="#">
      </figure>
    </div>
  
    <?php

    // permet de savoir sur quel page on est
    $adresseURL = 'galerie';

    include 'header.php';
    include 'connection.php';

    ?>

      <!-- main -->
        <main class="block-content-body">
        <section class="section-2 section-galerie">


          <?php $requete = $connection->query("SELECT * FROM galerie ORDER BY id");

          $requeteresultat = $requete -> fetchAll();

          $nombreImage = 1;

          echo '<div class="row">';

          foreach ($requeteresultat as $key) {

          if($nombreImage == 4){
            echo '</div><div class="row">';
            $nombreImage = 0;
          }

          echo '<div class="col-sm-4"><img class="contenu-commentaire-image" src="'.$key -> url.'"></div>';

          $nombreImage++;
          }
          ?>
                
        </section>
      </main>

   <!--footer -->
      <?php

      include 'footer.php'

      ?>

    <script type="text/javascript" src="script/jquery.js"></script>
    <script type="text/javascript" src="script/script.js"></script>
    <script>
    // $('.image-galerie-solo').click(function(){

    //     console.log($(this).attr("src")); 
    
    //     $('.image-galerie-fullscreen').html();
    // });
    </script>
  </body>
</html>
