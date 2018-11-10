<?php

require_once 'IndexController.php';
// 'View/View.php';

class Router
{
    private $indexCtrl;

    public function __construct()
    {
        $this->indexCtrl = new IndexController();
    }
    public function routing()
    {
			if(isset($_GET['action']))
			{
                if ($_GET['action'] === 'homepage') {
                    $this->indexCtrl->homepage();
                }
                elseif ($_GET['action'] === 'registration')
                {
                    $this->indexCtrl->registration();
                }
                elseif($_GET['action'] === 'connection')
                {
                    $this->indexCtrl->connection();
                }

			}else
			{
				$this->indexCtrl->homepage();
			}
		
    }

    //ajout commentaire
}