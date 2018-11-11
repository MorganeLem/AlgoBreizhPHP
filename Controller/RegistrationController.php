<?php
require_once 'View/View.php';
require_once 'Model/Manager.php';


class RegistrationController extends Manager
{
	
	
	public function __construct()
    {
    }
	
	public function Inscription()
	{
		$vue = new Vue("RegistrationView");
		$vue->generer(array());
	}
	
	public function InscriptionV($CodeClient, $Nom, $Prenom, $Email)
	{
		
		if( isset($Nom) & isset($Prenom) & isset($Email) & isset($CodeClient))
		{
			$this->getdb();
			$verifCodeClient = $this->queryExecute('SELECT CodeClient FROM client WHERE CodeClient = "'.$CodeClient.'"');
			$verifCodeClient = $verifCodeClient->fetch();
			echo $verifCodeClient;
			echo $verifCodeClient;
			while ($CodeClient = $verifCodeClient->fetch())
			{
				$sql = 'UPDATE client SET CodeClient = ? ';
				$this->queryExecute($verifCodeClient , $CodeClient);
				echo 'vous êtes inscrit avec succès';
			}
		}
	}
}