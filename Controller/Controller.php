<?php

require_once 'HomepageController.php';
// 'View/View.php';

class Controller
{
    private $homepageCtrl;

    public function __construct()
    {
        $this->homepageCtrl = new HomepageController();
    }
    public function root()
    {
			if(isset($_GET['action']))
			{
				if($_GET['action'] == 'homepage')
				{
					$this->homepageCtrl->homepage();
				}
				if($_GET['action'] == 'registration');
				{
					$this->homepageCtrl->Inscription();
				}
			}else
			{
				$this->homepageCtrl->homepage();
			}
		
    }

    //ajout commentaire
}