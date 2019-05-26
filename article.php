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
    $adresseURL = 'article';

    include 'header.php';
    include 'connection.php';

    if(isset($_GET['id'])){

      if(isset($_POST['submitcomm']) AND !empty($_POST['contenucomm'])){

        $contenucomm = $_POST['contenucomm'];

        $reqcom = $connection->prepare('INSERT INTO commentaires(auteur, contenu, id_article, datecom) VALUES(?,?,?,?)');

				$datecom = date("Y-m-d H:i:s");
				
        $reqcom->execute(array($_SESSION['pseudo'], $contenucomm, $_GET['id'], $datecom));

        $_POST['contenucomm'] = null;
      }


    }else{
      header('Location: index.php');
    }

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
                <h2><?php echo $articleInfo -> titre; ?></h2>
                <div class="article-infos">
                  <i class="far fa-calendar-alt"></i>
                  <p><?php echo $articleInfo -> datearticle; ?></p>
                  <i class="fas fa-user-alt"></i>
                  <p><?php echo $articleInfo -> auteur; ?></p>
                  <i class="far fa-comment"></i>
                  <p>
                    <?php
                      
                      $requetecom = "SELECT * FROM commentaires WHERE id_article=".$_GET['id'];
                      $requetecom2 = $connection -> query($requetecom);
                      $mailexist = $requetecom2->rowCount();
                      echo $mailexist;
                    
                    ?>
                  
                  Commentaires</p>
                  <i class="fas fa-tasks"></i>
                  <p>Jour <?php echo $articleInfo -> jour; ?></p>
                </div>
              </div>

              <div class="article-contenu">
              <?php echo $articleInfo -> contenu; ?>
              </div>

            </div>


         </section>

        <section class="article-commentaire">

        <?php


        $prereq = "SELECT * FROM commentaires WHERE id_article='".$_GET['id']."' ORDER BY id DESC";
        $requete = $connection -> query($prereq);
        $requeteresultat = $requete -> fetchAll();


        foreach ($requeteresultat as $key) { ?>

         <div class="commentaire-article">
           <div class="infos-commentaire">
             <p class="auteur"><?php echo $key->auteur;?></p>
             <p class="date"><?php echo $key->datecom;?></p>
           </div>
           <div class="contenu-commentaire">
          <?php echo $key->contenu;?>
           </div>
         </div>
          
          <?php 
        }

        ?>

        </section>

         <section class="article-add-commentaire">

         <?php 

         if(isset($_SESSION['id'])){

          ?>
          <div class="container-article-comment">

            <form action="" method="POST">
              <textarea name="contenucomm"></textarea>
              <input name="submitcomm" type="submit" value="Ajouter mon commentaire">
            </form>
            
          </div>
          <?php

         }else{


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
