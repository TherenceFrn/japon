<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Japon</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <?php include 'head.php'; ?>
  <?php

  include 'favicon.php';
  ?>
</head>
<body>
  <?php

  // permet de savoir sur quel page on est
  $adresseURL = 'listarticles';

  include 'header.php';
  include 'connection.php';

  if(isset($_SESSION['id'])){


  }else{

    header('Location: connexion.php');
  }
  ?>

  <!-- main -->
  <main class="block-content-body">
    <section class="section-1 section-liste-articles">


  <div class="container">
    <div class="container-liste-articles">
      <h2>Liste des articles</h2>
      <a href="addarticle.php">  
        <button class="btn btn-success">Créer un nouvel article</button>
      </a>
    </div>
      <br>
    <table class="table table-bordered table-striped" style="background-color: white;">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nom</th>
          <th>Auteur</th>
          <th>Date</th>
          <th>Voir</th>
          <th>Editer</th>
          <th>Supprimer</th>
        </tr>
      </thead>
      <tbody id="myTable">

      <?php

      $requete = $connection->query("SELECT * FROM articles ORDER BY id DESC");
      $requeteresultat = $requete -> fetchAll();
      foreach ($requeteresultat as $key) {
      	?>
        <tr>
          <td>#<?php echo $key -> id;?></td>
          <td><?php echo $key -> titre;?></td>
          <td><?php 
          
                    </td>
          <td><?php echo $key -> datearticle;?></td>
          <td><a href="article.php?id=<?php echo $key -> id;?>"><button class="btn btn-primary">Voir</button></a></td>
          <td><a href="editionarticle.php?id=<?php echo $key -> id;?>"><button class="btn btn-success">Editer</button></a></td>
          <td><a href="supprarticle.php?id=<?php echo $key -> id;?>"><button class="btn btn-danger">Supprimer</button></a></td>
        </tr>
        <?php
        }
      ?>
      </tbody>
    </table>
  </div>
    </section>
  </main>

  <!-- footer -->
  <?php
  include 'footer.php';

  ?>
  <!-- other -->
  <?php

  if(isset($e)){

    ?>
    <script type="text/javascript">
        console.log('Erreur : '+'<?php echo $e; ?>');
    </script>
  <?php
  }

  ?>


  <script type="text/javascript" src="script/jquery.js"></script>
  <script type="text/javascript" src="script/script.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
