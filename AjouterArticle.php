<?php
  require_once 'ArticleManager.php';

  if(isset($_POST['article']) && $_POST['article']== 'article' ){

    $errors=[];

    if(empty($_POST['titre'])){

      $errors[]="Veuillez sélectionner un titre à l'article ";
    }
    if(empty($_POST['contenu'])){

      $errors[]="Veuillez saisir le contenu de l'article";
    }
    
    if(empty($_POST['categories'])){
      
        $errors[]="Veuillez indiquer une categorie de l'article";
      }
    
    if(count($errors)==0){
      // j'essaye de créer un objet de ArticleManager
        $article= new ArticleManager() ;
        $article->setTitre($_POST['titre'])
                ->setContenu($_POST['contenu'])
                ->setCategorieId($_POST['categories']);

        // dans le cas en a bien saiser le formulaire on essaye de sauvgarder dasn la base de donné 
        if($article->save() > 0){
            $message="Article bien ajouté !";
        }
        else{
            $message="Une erreur est survenue";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Inscription </title> 
        	<link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        	<link href="css/responsive.css" rel="stylesheet">        
    </head>
   <body>
          <!--Récupération de navBar!-->
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
          <!-- fin de Récupération de navBar!-->
 <h1 style="text-align:center;"> Ajouter Votre Article ! </h1>
<div class="container">
<div class="row1" style="margin: 0 auto ; width:50%;  position:auto;">
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
                    <label class="form-label">Titre de L'article </label>
                    <input  type="titre" name="titre" class="form-control" >
                    
                </div>
                <div class="mb-3">
                    <label class="form-label">Contenu de l'artice</label>
                    <input  type="text" name="contenu" class="form-control" >
                </div>
                
              <!--ajouter la boucle qui genère les categories !-->
                <div class="mb-3">
                    <label class="form-label">Categories</label>             
		            <select name="categories" id="cat">
		        	<?php
				         require_once 'CategorieManager.php';
				         $categories = CategorieManager::findAll();
				         foreach ($categories as $categorie) {          
                                echo "<option value='".$categorie->id."'>".$categorie->nom."</option>";
                            }
                    ?>
		            </select>
                </div>

                <button type="submit" name="article" value="article" class="btn btn-primary"> sauvegarder</button>
 </form>
 </div>
 </div>
</body>
</html>
