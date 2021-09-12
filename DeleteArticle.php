<?php

if(isset($_GET['article'])){
	require_once 'ArticleManager.php';

	$a = ArticleManager::delete($_GET['article']);
	if($a > 0){
		echo "<p> l'article bien supprimer</p>";
	}
	else{
		echo "<p>n'est pas encore supprimerl'article </p>";
	}
}
else{
	echo "<p>Article introuvable</p>";
}