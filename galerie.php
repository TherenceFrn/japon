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
                <h2>Carousel Example</h2>  
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="https://i.imgur.com/CYiHkUl.png" alt="Los Angeles" style="width:100%;">
                    </div>

                    <div class="item">
                      <img src="https://i.imgur.com/CYiHkUl.png" alt="Chicago" style="width:100%;">
                    </div>
                  
                    <div class="item">
                      <img src="https://i.imgur.com/CYiHkUl.png" alt="New york" style="width:100%;">
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                  </a>
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
