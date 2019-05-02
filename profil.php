<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Japon</title>
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/gidole-regular" type="text/css"/>
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/style.css" type="text/css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
  <?php

  // permet de savoir sur quel page on est
  $adresseURL = 'profil';

  include 'header.php';
  include 'connection.php';

  if(isset($_GET['id']) AND $_GET['id'] > 0){

    $getid = intval($_GET['id']);

    $requser = $connection->prepare('SELECT * FROM membres WHERE id=?');
    $requser->execute(array($getid));

    $userinfo = $requser->fetch();
  }else{

    header('Location: connexion.php');
  }
  ?>

  <!-- main -->
  <main class="block-content-body">
    <section class="section-1 section-inscription">

      <div class="container">
        <h2>Profil</h2>
        <h3><?php echo $userinfo-> nom.' '; echo $userinfo-> prenom;?></h3>
        <div class="card">
          <div class="card-body">


            <img src="images/avatar/<?php echo $userinfo-> avatar; ?>" class="rounded float-right img-thumbnail" alt="avatar" width="200px" height="200px">
            <h4 class="card-title"><h5>Nom Prenom : </h5><?php echo $userinfo-> nom.' '; echo $userinfo-> prenom;?></h4>
            <p class="card-text"><h5>Pseudo : </h5><?php echo $userinfo-> pseudo;?></p>
            <p class="card-text"><h5>e-Mail : </h5><?php echo $userinfo-> mail;?></p>
            <p class="card-text"><h5>Numéro d'utilisateur : <a href="profil.php?id=<?php echo $userinfo-> id;?>"></h5>#<?php echo $userinfo-> id;?></p></a>

            <?php if(isset($_SESSION['id']) AND $userinfo-> id == $_SESSION['id']){
                ?>
                <a href="editionprofil.php"><button type="button" class="btn btn-primary">Editer mon profil</button></a>
                <a href="listearticle.php"><button type="button" class="btn btn-success">Créer un article</button></a>
                <a href="deconnexion.php"><button type="button" class="btn btn-danger float-right">Se déconnecter</button></a>
                <?php
                } ?>
          </div>
        </div>
        <div class="card">

        <div class="alert alert-secondary">
              Mes commentaires :
          </div>
        <table class="table">
         <thead>
           <tr>
             <th>Firstname</th>
             <th>Lastname</th>
             <th>Email</th>
           </tr>
         </thead>
         <tbody>
           <tr>
             <td>Default</td>
             <td>Defaultson</td>
             <td>def@somemail.com</td>
           </tr>
           <tr class="table-primary">
             <td>Primary</td>
             <td>Joe</td>
             <td>joe@example.com</td>
           </tr>
           <tr class="table-success">
             <td>Success</td>
             <td>Doe</td>
             <td>john@example.com</td>
           </tr>
           <tr class="table-danger">
             <td>Danger</td>
             <td>Moe</td>
             <td>mary@example.com</td>
           </tr>
           <tr class="table-info">
             <td>Info</td>
             <td>Dooley</td>
             <td>july@example.com</td>
           </tr>
           <tr class="table-warning">
             <td>Warning</td>
             <td>Refs</td>
             <td>bo@example.com</td>
           </tr>
           <tr class="table-active">
             <td>Active</td>
             <td>Activeson</td>
             <td>act@example.com</td>
           </tr>
           <tr class="table-secondary">
             <td>Secondary</td>
             <td>Secondson</td>
             <td>sec@example.com</td>
           </tr>
           <tr class="table-light">
             <td>Light</td>
             <td>Angie</td>
             <td>angie@example.com</td>
           </tr>
           <tr class="table-dark text-dark">
             <td>Dark</td>
             <td>Bo</td>
             <td>bo@example.com</td>
           </tr>
         </tbody>
        </table>
        </div>
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
