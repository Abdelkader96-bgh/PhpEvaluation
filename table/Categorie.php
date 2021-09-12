<?php

class Categorie{
	private $id;
	private $nom;
	
	public function getId() : int
	{
		return $this->id;
	}

	public function setNom(string $n) : self
	{
		$this->nom = $n;
		return $this;
	}
	public function getNom() : string
	{
		return $this->nom;
	}

}