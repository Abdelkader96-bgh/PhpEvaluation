<?php

require_once  'CategorieManager.php' ;


$c=new CategorieManager();
$categories=$c->findAll();

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
     <title>Mon Blog</title>
    <style>
        .media-object{
            width :150px;
            height:150px;
        }
    </style>
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
          <a class="nav-link" href="index.php">Mes artices</a>
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

<div class ="row">

<?php foreach($categories as $categorie)  :?>

<div class="col">
<div class="card" style="width: 30rem;">
  <img class="card-img-top" src="image/culture.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><strong><?= $categorie->nom ?></strong></h5>
    <p class="card-text">Conetnu</p>
    <a href="#" class="btn btn-primary">afficher les articles de cette categorie</a>
  </div>
</div>
</div>

<?php  endforeach ;?>
</div>
</body>
<html>