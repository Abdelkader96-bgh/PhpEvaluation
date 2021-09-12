<?php

if(isset($_GET['commentaire'])){
	require_once 'CommentaireManager.php';

	$com = CommentaireManager::delete($_GET['commentaire']);
	if($com > 0){
		echo "<p> le commmentaire est bien supprimer</p>";
        
	}
	else{
		echo "<p>le commentaire n'est encore supprimé</p>";
        
	}
}
else{
	echo "<p>Commentaire introuvable</p>";
   
}
