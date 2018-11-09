<?php

require_once 'IndexController.php';
// 'View/View.php';

class Router
{
    private $homepageCtrl;

    public function __construct()
    {
        $this->homepageCtrl = new IndexController();
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