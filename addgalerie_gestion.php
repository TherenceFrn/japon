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


    if(isset($_POST['add_image_galerie'])){

        if(!empty($_POST['quote_image']) AND !empty($_POST['url_image'])){

          $requetImage = $connection->prepare('INSERT INTO galerie(url_image,quote) VALUES(?,?)');
          $requetImage->execute(array(
            $_POST['url_image'],
            $_POST['quote_image']
          ));

          header('Location: addgalerie.php');

      }
    }else{
      header('Location: index.php');
    }


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
