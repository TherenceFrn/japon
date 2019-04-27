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
            }
           ?>
    </div>
    <div class="scroller">
    </div>
  </div>
</div>

</header>
