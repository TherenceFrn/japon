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

?>