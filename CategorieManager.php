<?php

require_once 'PDO/BDD.php';
require_once 'table/Categorie.php';

class CategorieManager extends Categorie{
	public static function findAll(){
		$sql = 'SELECT * FROM categorie';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute();

		return $req->fetchAll(PDO::FETCH_OBJ);
	}
}