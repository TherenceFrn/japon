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

    if($_SESSION['email'] != 'test@test.test'){

      header('Location: index.php');
    }

    ?>

      <!-- main -->
        <main class="block-content-body">
        <section class="section-2 section-galerie">


          <?php $requete = $connection->query("SELECT * FROM galerie ORDER BY id");

          $requeteresultat = $requete -> fetchAll();
          ?>

          <form action="addgalerie_gestion.php" method="POST">

          <input name="url_image" type="text" placeholder="URL Image">
          <input name="quote_image" type="text" placeholder="Quote Image">
          <input name="add_image_galerie" type="submit">
          </form>
                
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
