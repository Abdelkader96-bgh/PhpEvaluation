<?php

require_once 'PDO/BDD.php';
require_once 'table/Commentaire.php';

class CommentaireManager extends Commentaire{
    
	public static function findAll(){
        //la requete pour la fontion findAll()
		$sql = 'SELECT * FROM commentaire';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute();

		return $req->fetchAll(PDO::FETCH_OBJ);
	}
    //fonction qui permet d'enregistrer les données dans la tables commentaires
	public function save(){

		$sql = 'INSERT INTO commentaire(contenu, article_id,statut) VALUES (:c,:a,:s)';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'c' => $this->getContenu(),
			'a' => $this->getArticleId(),
            's' => $this->getStatut(),
            
		]);

		return $req->rowCount();
	} 
    
    // afficher un seul commentaire

	public static function findOneById(int $id){
		$sql = 'SELECT * FROM commentaire WHERE id = :id';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'id' => $id
		]);

		return $req->fetchAll(PDO::FETCH_CLASS, 'Commentaire');
	}

    // fonction permet de modifier un Commentaire 
	public function update(Commentaire $commentaire){
		$sql = 'UPDATE Ccommentaire SET contenu = :c, statut = :s, article_id = :a WHERE id = :id';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
            'c' => $commentaire->getContenu(),
			's' => $commentaire->getStatut(),
			'a' => $commentaire->getArticleId(),
			'id'=> $commentaire->getId()
		]);

		return $req->rowCount();
	}

  //fonction permet de supprimer un comentaire

	public static function delete(int $id){
		$sql = 'DELETE FROM commentaire WHERE id = :id';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'id' => $id
		]);

		return $req->rowCount();
	}

// afficher le nombre de commentaire par articles 
    public function CommentaireArticle(int $id){
        //$sql = 'SELECT c.id, count(*) as nbComments from commentaire as c INNER JOIN article as a ON a.id = c.article_id ';
        $sql = 'SELECT id,contenu FROM commentaire WHERE article_id = :id AND statut = 1';
        $bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'id' => $id
		]);
    
	}
}
