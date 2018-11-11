<?php
require_once 'View/View.php';

class ConnexionController
{

	public function __construct()
    {
    }
	
	public function Connexion()
	{
		$vue = new Vue("connexionView");
		$vue->generer(array());
	}
	public function test($CodeClient,$mdp)
	{
		if($CodeClient != "")
		{
			echo 'plein :'.$CodeClient;
		}else{
			echo 'vide';
		}
	}
	
}