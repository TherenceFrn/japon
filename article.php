<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Japon</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   
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
    $adresseURL = 'article';

    include 'header.php';

    if(isset($_GET['id'])){

     

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
                  <img class="" src="<?php echo 'images/article/'.$articleInfo -> avatar; ?>" alt="" />
                </a>
              </div>
              
              <div class="article-content">
                <h2><?php echo $articleInfo -> titre; ?></h2>
               
              </div>

              <div class=" article-contenu container">
              <?php echo $articleInfo -> contenu; ?>
              </div>

               <div class="article-infos container">
                  <i class="far fa-calendar-alt"></i>
                  <p><?php echo $articleInfo -> datearticle; ?></p>
                  <i class="fas fa-user-alt"></i>
                  <p><?php
                  
                    $prereqIm = $connection->prepare("SELECT * FROM membres WHERE id=?");
                    $prereqIm->execute(array($articleInfo -> id_auteur));
                    $infosim = $prereqIm->fetchAll();

                    foreach($infosim as $keyIm){
                      echo $keyIm->pseudo;
                    }
                        
                  ?></p>
                  <i class="far fa-comment"></i>
                  <p>
                    <?php
                      
                      $requetecom = "SELECT * FROM commentaires WHERE id_article=".$_GET['id'];
                      $requetecom2 = $connection -> query($requetecom);
                      $mailexist = $requetecom2->rowCount();
                      // echo $mailexist;
                    
                      $requetecom = "SELECT * FROM commentaires_anon WHERE id_article=".$_GET['id'];
                      $requetecom2 = $connection -> query($requetecom);
                      $mailexist2 = $requetecom2->rowCount();
                      // echo $mailexist;

                      $mailexist3 = $mailexist + $mailexist2;
                      echo $mailexist3;
                    ?>  
                  
                  Commentaires</p>
                  <i class="fas fa-tasks"></i>
                  <p>Jour <?php echo $articleInfo -> jour; ?></p>
                </div>
            </div>


         </section>

        <section class="article-add-commentaire container">

         <?php 

         if(isset($_SESSION['id'])){

          ?>
          <div class="container-article-comment">

            <form action="addcomm.php?id=<?php echo $getid;?>" method="POST">
              <textarea name="contenucomm"></textarea>
              <input name="submitcomm" type="submit" value="Ajouter mon commentaire">
            </form>
            
          </div>
          <?php

         }else{

          ?>

          <div class="container-article-comment">

            <form action="addcomm.php?id=<?php echo $getid;?>" method="POST">
              <input name="comm-utilisateur-anon" type="text" placeholder="Votre Nom"> 
              <textarea name="contenucomm-anon"></textarea>
              <input name="submitcomm-anon" type="submit" value="Ajouter mon commentaire">
            </form>
            
          </div>

          <?php
         }

         ?>
         </section>

        <section class="article-commentaire container">

        <?php
        $prereq = "SELECT * FROM commentaires WHERE id_article='".$_GET['id']."' ORDER BY id DESC";
        $requete = $connection -> query($prereq);
        $requeteresultat = $requete -> fetchAll();


        foreach ($requeteresultat as $key) { ?>

         <div class="commentaire-article">
           <div class="imagePDP">
             <img src="images/avatar/<?php 
             
             $prereqIm = $connection->prepare("SELECT * FROM membres WHERE id=?");
             $prereqIm->execute(array($key->id_auteur));
             $infosim = $prereqIm->fetchAll();

             foreach($infosim as $keyIm){
              echo $keyIm->avatar;
             }
             ?>" alt="">
           </div>
           <div class="content">
             <div class="infos-commentaire">
               <p class="auteur"><?php
               
              $prereqIm = $connection->prepare("SELECT * FROM membres WHERE id=?");
              $prereqIm->execute(array($key->id_auteur));
              $infosim = $prereqIm->fetchAll();

              foreach($infosim as $keyIm){
                echo $keyIm->pseudo;
              }

               ?></p>
               <p class="date"><?php echo $key->datecom;?></p>
              </div>
              <div class="contenu-commentaire">
                <?php echo $key->contenu;?>
              </div>
            </div>
         </div>
          
          <?php 
        }

        ?>

        <!-- commentaires anonymes -->
        <?php
        $prereq = "SELECT * FROM commentaires_anon WHERE id_article='".$_GET['id']."' ORDER BY id DESC";
        $requete = $connection -> query($prereq);
        $requeteresultat = $requete -> fetchAll();


        foreach ($requeteresultat as $key) { ?>

         <div class="commentaire-article">
           <div class="imagePDP">
             <img src="images/avatar/avatar.gif" alt="avatar">
           </div>
           <div class="content">
             <div class="infos-commentaire">
               <p class="auteur"><?php echo $key->auteur; ?></p>
               <p class="date"><?php echo $key->date_com; ?></p>
              </div>
              <div class="contenu-commentaire">
                <?php echo $key->contenu;?>
              </div>
            </div>
         </div>
          
          <?php 
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
    <script>
    var textHTML = $('.article-contenu').text();
    $('.article-contenu').html(textHTML);
    </script>
  </body>
</html>
