<?php
//pour récupérer l'id de l'artice nous l'avons passe au niveau de lien href DetailArticle.php?article=<?= $article->id; 

if(isset($_GET['article'])){

require_once  'ArticleManager.php';
$a=new ArticleManager();

require_once 'CommentaireManager.php';
$c= new CommentaireManager();
$comt=$c->CommentaireArticle($_GET['article']);



$art=$a->findOneById($_GET['article']);
if($art != false){
 
  $art= $art[0];

 // formulaire de commentaire 
if(isset($_POST['contenu']) && $_POST['commentaire']== 'commentaire' ){

    $errors=[];

    if(empty($_POST['contenu'])){

      $errors[]="Veuillez rajouter un contenu de votre commentaire ";
    } 

    if(count($errors)==0){
        
        // j'essaye de créer un objet de commentaireeManager
          $commentaire= new CommentaireManager() ;
          $commentaire->setContenu($_POST['contenu'])
                      ->setStatut(true)
                      ->setArticleId($art->getId());
                      
          // dans le cas en a bien saiser le formulaire on essaye de sauvgarder dasn la base de donné 
          if($commentaire->save() > 0){
              $message="commentaire bien ajouté !";
          }
          else{
              $message="Une erreur est survenue";
              }
      }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
     <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
     <link href="style.css" rel="stylesheet">
     <script defer src="script.js"></script>
     <title>Mon article</title>

</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
<div class="container-fluid">
    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img src="image/blog.jpg" height="30" width="30"  loading="lazy"/>
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Mes arctices</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="AjouterArticle.php">Ajouter un articles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="showCategorie.php">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="showCommentaires.php">Commentaires</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
</div>    
</nav>
<!--afficher l'article en détail-->

<div class="jumbotron" style="margin: 0 auto; margin-top: 20px; width: 100%;">
      <h3> Article :<?= $art->getId() ?></h3>
    
            <table class="table table-hover" style="margin-top: 10px;">
                <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Categorie</th>
                    <th scope="col"></th>  
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                
                    <tr>
                        <td><?= $art->getId() ?></td>
                        <td><?= $art->getTitre() ?></td>
                        <td><?= $art->getContenu() ?></td>
                        <td><?= $art->getCategorieId()  ?></td>
                        <td><a class="btn btn-info" href="EditArticle.php?article=<?= $_GET['article']; ?>">Modifier</a></td>
                        <td><a class="btn btn-info" href="DeleteArticle.php?article=<?= $_GET['article']; ?>">Suprimer</a></td>
                        <td>
                        <a id="Popupbutton" class="Popupbutton">Commenter</a>
                        <!--fenetre pour ajouter un commentaire!--> 
                        <div id="overlay" class="overlay">
                            <div id="popup" class="popup">
                                <h2>Ajouter votre commentaire<span id="btnClose" class="btnClose">fermer</span></h2>
                            <!-- notre formulaire commentaire!--> 
                            <div>
                                              <?php
                                                if(isset($message)){  ?>
                                                <div class="alert alert-success">
                                                <?= $message ?>
                                                </div>
                                            <?php  }
                                            ?>

                                            <?php
                                                if(isset($errors) && count($errors)){  ?>
                                                <div class="alert alert-danger">
                                                <ul>
                                                    <?php 
                                                        foreach($errors as $error){
                                                        echo "<li>".$error."</li>";
                                                        }
                                                    ?>
                                                </ul>
                                                </div>
                                                <?php  }
                                              ?>
                             <form method="post" action="">
                              <div class="mb-3">
                                  <label class="form-label">Contenu</label>
                                  <input  type="text" name="contenu" class="form-control" >
                                </div>
                              <button type="submit" name="commentaire" value="commentaire" class="btn btn-primary"> sauvegarder</button>
                            </form>
                           </div>
                          </div>
                      </div>
                      <!---fin de formulaire!--->
                      </td>
                    </tr>             
                </tbody>
            </table>

 <hr>

    <div class="jumbotron" style="margin: 0 auto; margin-top: 20px; width: 100%;">
         <h3>Les Commentaires</h3>      
        <!-- Liste des commentaires du l'articles à revenir elle m'envoit que l'article au début est null-->
        <!-- j'aimerais bien afficher pour chaque article ses commentaires mais de status=1 (publié)-->
         
      <?php   if($comt != false) {
                 $comt=$comt[0];
                 
                 ?>
         
                <table class="table table-hover" style="margin-top: 10px;">
                <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">Contenu</th>
                </tr>
                </thead>
                <tbody>
                   
                    <tr>
                        <td><?= $comt->getId() ?></td>
                        <td><?= $comt->getContenu ?></td>
                        </tr>
                        
                    </tbody>
                   </table>
                     <?php
                        }
                        else{
                        // dans le cas ou nous avons pas trouve lid de larticle 
                          echo "pas de commentaire";
                        }
                        ?>           
      </div> 

     
 <?php
 }
 else{
 // dans le cas ou nous avons pas trouve lid de larticle 
  echo "article introuvable";
 }
}
 ?>
    </body>
</html>