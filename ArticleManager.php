<?php

require_once 'PDO/BDD.php';
require_once 'table/Article.php';

class ArticleManager extends Article{

	public static function findAll(){
        //la requete pour la fontion findAll()
		$sql = 'SELECT * FROM article';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute();

		return $req->fetchAll(PDO::FETCH_OBJ);
	}
    //fonction qui permet d'enregistrer les données dans la tables articles 
	public function save(){

		$sql = 'INSERT INTO article(titre, contenu, categorie_id) VALUES (:t,:c,:ct)';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			't' => $this->getTitre(),
			'c' => $this->getContenu(),
            'ct' => $this->getCategorieId()
		]);

		return $req->rowCount();
	}
    // afficher un seul article en détailes

	public static function findOneById(int $id){
		$sql = 'SELECT * FROM article WHERE id = :id';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'id' => $id
		]);

		return $req->fetchAll(PDO::FETCH_CLASS, 'Article');
	}

    // fonction permet de modifier un article 
	public function update(Article $article){
		$sql = 'UPDATE article SET titre = :t, contenu = :c, , categorie_id = :ct WHERE id = :id';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
            't' => $article->getTitre(),
			'c' => $article->getContenu(),
            'ct' => $article->getCategorieId(),
			'id'=> $article->getId()
		]);

		return $req->rowCount();
	}

  //fonction permet de supprimer un article 

	public static function delete(int $id){
		$sql = 'DELETE FROM article WHERE id = :id';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'id' => $id
		]);

		return $req->rowCount();
	}
}