<nav>
  <div class="block-nav">
    <div class="inner">
      <div class="block-logo-nav">
        <figure>
          <a href="index.php"><img class="logo-nav" src="images/header/logo-japon-sans-texte.svg" alt="Logo" title="Logo"></a>
        </figure>
      </div>
      <div class="block-nav-menu">
        <ul class="block-nav-ul">
          <li class="block-nav-li"><a href="index.php">HOME</a></li>
          <li class="block-nav-li"><a href="articles.php">ARTICLES</a></li>
          <li class="block-nav-li"><a href="galerie.php">GALERIE</a></li>
          <li class="block-nav-li"><a href="map.php">MAP</a></li>
        </ul>
      </div>
      <div class="block-connexion-nav">
        <a href=" <?php if(isset($_SESSION['id'])){ echo 'profil.php?id='.$_SESSION['id'];}else{ echo 'connexion.php';} ?> "><i class="fas fa-user"></i></a>
      </div>
    </div>
  </div>
</nav>