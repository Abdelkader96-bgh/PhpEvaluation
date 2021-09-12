<?php

class Commentaire{
	private $id;
	private $contenu;
    private $status;
    private $article_id;
	
	public function getId() : int
	{
		return $this->id;
	}

	public function setContenu(string $contenu) : self
	{
		$this->contenu = $contenu;
		return $this;
	}
	public function getContenu() : string
	{
		return $this->contenu;
	}

    public function setStatut(float   $statut) : self
	{
		$this->statut = $statut;
		return $this;
	}
	public function getStatut() : float
	{
		return $this->statut;
	}

    public function setArticleId(int $id) : self
	{
		$this->article_id = $id;
		return $this;
	}
	public function getArticleId() : int
	{
		return $this->article_id;
	}

}