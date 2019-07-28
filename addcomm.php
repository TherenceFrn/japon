 <?php 
 include ('connection.php');

 if(isset($_POST['submitcomm']) AND isset($_POST['contenucomm']) AND isset($_SESSION['id'])){

        $contenucomm = $_POST['contenucomm'];

        $reqcom = $connection->prepare('INSERT INTO commentaires(id_auteur, contenu, id_article, datecom) VALUES(?,?,?,?)');

	    $datecom = date("Y-m-d H:i:s");
				
        $reqcom->execute(array($_SESSION['id'], $contenucomm, $_GET['id'], $datecom));

        $_POST['submitcomm'] = null;
        $_POST['contenucomm'] = null;

        header('Location: article.php?id='.$_GET['id']);
      }


if(isset($_POST['submitcomm-anon']) AND isset($_POST['contenucomm-anon']) AND isset($_POST['comm-utilisateur-anon'])){

  $contenucomm = $_POST['contenucomm-anon'];

  $reqcom = $connection->prepare('INSERT INTO commentaires_anon(auteur, contenu, id_article, date_com) VALUES(?,?,?,?)');

  $datecom = date("Y-m-d H:i:s");
  
  $reqcom->execute(array(
    $_POST['comm-utilisateur-anon'],
    $contenucomm,
    $_GET['id'],
    $datecom
  ));

  $_POST['submitcomm'] = null;
  $_POST['contenucomm'] = null;

  header('Location: article.php?id='.$_GET['id']);
}


?>