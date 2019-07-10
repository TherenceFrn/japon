<?php
session_start();
?>
<header>
<div class="block-header">
  <div class="block-wallpaper-header">
    <div class="block-degrade-header">
      <img src="images/header/header-image.jpg" class="block-fond-header" alt="">
    </div>
  </div>
    <?php
    include 'nav.php'

    ?>

  <div class="block-content-header">
    <div class="block-title-header">
          <?php
            if($adresseURL == 'index'){
                ?>
                <h1>BLOG <br>JAPON</h1>
                <h2>Blog sur un voyage au Japon</h2>
              <?php
            }else if($adresseURL == 'articles'){
              ?>
              <h1>LES <br>ARTICLES</h1>
              <h2>Les articles réalisés durant notre voyage au Japon</h2>
            <?php
            }else if($adresseURL == 'connexion'){
              ?>
              <h1>ESPACE<br>CONNEXION</h1>
              <h2>Connecte-vous avec vos identifiants</h2>
            <?php
            }else if($adresseURL == 'inscription'){
              ?>
              <h1>ESPACE <br>INSCRIPTION</h1>
              <h2>Une fois inscris vous pourrez mettre des commentaires sous les articles</h2>
            <?php
            }else if($adresseURL == 'profil'){
              ?>
              <h1>VOTRE<br>PROFIL</h1>
              <h2>Vous pouvez voir et changez vos informations ainsi que les commentaires que vous avez mis</h2>
            <?php
            }else if($adresseURL == 'erreur'){
              ?>
              <h1>PAGE<br>ERREUR</h1>
              <h2><?php echo $erreurPage; ?></h2>              
              <?php
            }else if($adresseURL == 'article'){
              $getid = $_GET['id'];
              $requete = $connection->prepare('SELECT * FROM articles WHERE id=?');
              $requete->execute(array($getid));
              $articleInfo = $requete->fetch();

              ?>
              
              <h1>ARTICLE <br> JOUR : <?php echo $articleInfo -> jour; ?></h1>
              <h2><?php echo $articleInfo -> titre; ?></h2>
            <?php
            }else if($adresseURL == 'map'){
              ?>
              <h1>GOOGLE MAP<br>LA CARTE</h1>
              <h2>La carte de notre voyage</h2>              
              <?php
            }
           ?>

          <img class="logo-nav-title" src="images/header/japon.svg" alt="Logo" title="Logo">        
    </div>
    <div class="scroller">
    </div>
  </div>
</div>

</header>
