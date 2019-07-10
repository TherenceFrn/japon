<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Japon</title>
   
    <?php 
    include 'connection.php';    
    include 'head.php'; ?>

  </head>
  <body>

 
<div class="modale-image" style="display: none;">
  <figure>
      <img src="' + varImage+'" alt="#">
  </figure>
</div>


    <?php

    // permet de savoir sur quel page on est
    $adresseURL = 'map';

    include 'header.php';

    ?>

      <!-- main -->
        <main class="block-content-body">
        <section class="section-1 section-map">

            <iframe src="https://www.google.com/maps/d/u/1/embed?mid=1qLGSDzwqXMjd5bOyWApFKYM_gokbyNHx" width="80%" height="100%"></iframe>

        </section>
      </main>

      <!-- footer -->
      <?php

      include 'footer.php'

      ?>

    <script type="text/javascript" src="script/jquery.js"></script>
    <script type="text/javascript" src="script/script.js"></script>
    <script>
    var textHTML = $('.article-contenu').text();
    $('.article-contenu').html(textHTML);
    </script>
  </body>
</html>
