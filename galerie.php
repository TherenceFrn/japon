<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Japon</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <?php include 'head.php'; ?>
  </head>
  <body>
    <?php

    // permet de savoir sur quel page on est
    $adresseURL = 'galerie';

    include 'header.php';
    include 'connection.php';

    ?>

      <!-- main -->
        <main class="block-content-body">
        <section class="section-1 section-caroussel">
            <div class="container">
                <div class="row">

                    <div class="col-sm-4 controle-galerie plus-galerie">
                            <p><</p>
                    </div>

                    <div class="col-sm-4">
                        <img src="https://i.imgur.com/ykXyWe7.jpg">
                    </div>

                    <div class="col-sm-4 controle-galerie moins-galerie">
                             <p>></p>   
                    </div>

                </div>
            </div>
        </section>  
        <section class="section-2 section-galerie">
               <div class="row">
                    <div class="col-sm-4"><img src="https://i.imgur.com/ykXyWe7.jpg"></div>
                    <div class="col-sm-4"><img src="https://i.imgur.com/ykXyWe7.jpg"></div>
                    <div class="col-sm-4"><img src="https://i.imgur.com/ykXyWe7.jpg"></div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><img src="https://i.imgur.com/ykXyWe7.jpg"></div>
                    <div class="col-sm-4"><img src="https://i.imgur.com/ykXyWe7.jpg"></div>
                    <div class="col-sm-4"><img src="https://i.imgur.com/KXv6s9d.jpg"></div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><img src="https://i.imgur.com/KXv6s9d.jpg"></div>
                    <div class="col-sm-4"><img src="https://i.imgur.com/KXv6s9d.jpg"></div>
                    <div class="col-sm-4"><img src="https://i.imgur.com/KXv6s9d.jpg"></div>
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
