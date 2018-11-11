<?php
require_once 'HomepageController.php';
require_once 'RegistrationController.php';
require_once 'ConnexionController.php';
//'View/View.php';

class Controller
{
    private $homepageCtrl;

    public function __construct()
    {
        $this->homepageCtrl 		= new HomepageController();
		$this->registrationCtrl 	= new RegistrationController();
		$this->connexionCtrl 		= new ConnexionController();
    }
	
    public function root()
    {
		if(isset($_GET['action']))
		{
			if($_GET['action'] == 'homepage')
			{
				$this->homepageCtrl->homepage();
			}
			if($_GET['action'] == 'Inscription')
			{
				$this->registrationCtrl->Inscription();
			}
			/*if($_GET['action'] == 'Connexion')
			{
				$this->connexionCtrl->Connexion();
			}*/
		}else
		{
			$this->homepageCtrl->homepage();
		}
		
    }
}
?>