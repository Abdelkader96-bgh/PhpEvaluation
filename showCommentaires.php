<?php

require_once 'CommentaireManager.php';

$c=new CommentaireManager();
$commentaires=$c->findAll();



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
     <title>les commentaies </title>

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
          <a class="nav-link" href="showcommentaires.php">Commentaires</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
</div>    
</nav>
<!--afficher les commentaires en détails -->
<div class="jumbotron" style="margin: 0 auto; margin-top: 20px; width: 100%;">         
            <table class="table table-hover" style="margin-top: 10px;">
                <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">Contenu </th>
                    <th scope="col">Statut</th>
                    <th scope="col">Article</th>
                    <th scope="col"></th>  
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($commentaires as $cmt)  :?>
                    <tr>
                        <td><?= $cmt->id; ?></td>
                        <td><?= $cmt->contenu; ?></td>
                        <td><?= $cmt->statut; ?></td>
                        <td><?= $cmt->article_id;  ?></td>
                        <td><a class="btn btn-info" href="editCommentaire.php?commentaire=<?= $cmt->id; ?>">Modifier</a></td>
                        <td><a class="btn btn-info" href="deleteCommentaire.php?commentaire=<?= $cmt->id; ?>">Suprimer</a></td>
                    </tr> 
                    <?php  endforeach ;
                    ?>  
                         
                </tbody>
            </table>
                </div>

</body>
</html>
