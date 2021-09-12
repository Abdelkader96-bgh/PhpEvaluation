<?php

class Article{
	private $id;
	private $titre;
	private $contenu;
    private $createdAt;
	private $categorie_id;
	
	public function getId() : int
	{
		return $this->id;
	}

	public function setTitre(string $titre) : self
	{
		$this->titre = $titre;
		return $this;
	}
	public function getTitre() : string
	{
		return $this->titre;
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
    

	public function setCategorieId(int $id) : self
	{
		$this->categorie_id = $id;
		return $this;
	}
	public function getCategorieId() : int
	{
		return $this->categorie_id;
	}
}