<?php

class BDD{
	const HOST = 'localhost';
	private $bdd = 'evaluation';
	const USER = 'root';
	const MDP = '';

	public function connexion(){
		try{
			return new PDO('mysql:host='.self::HOST.';dbname='.$this->bdd, self::USER, self::MDP);
		}
		catch(Exception $e){
			die('Erreur : '. $e->getMessage());
		}
	}
}