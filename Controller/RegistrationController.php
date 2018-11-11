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
		
		if( !empty($_POST['Nom']) && !empty($_POST['Prenom']) && !empty($_POST['email']) && !empty($CodeClient))
		{
			$verifCodeClient = $this->queryExecute('SELECT customer_code FROM customers WHERE customer_code = ?', array($CodeClient));
			$verifCodeClient = $verifCodeClient->fetch();
            if(!empty($verifCodeClient)){
                $sql = 'UPDATE customers SET firstname = ?, lastname = ?, email = ? WHERE customer_code = ?';
                $this->queryExecute($sql, array($_POST['Prenom'], $_POST['Nom'], $_POST['email'], $CodeClient));
                echo 'vous êtes inscrit avec succès';
            }



        }
	}
}

var_dump($CodeClient);
var_dump($_POST);