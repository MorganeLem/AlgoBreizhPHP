<?php

require_once 'HomepageController.php';
// 'View/View.php';

class Router
{
    private $homepageCtrl;

    public function __construct()
    {
        $this->homepageCtrl = new HomepageController();
    }
    public function routing()
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