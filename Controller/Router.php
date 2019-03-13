<?php

require_once 'IndexController.php';
// 'View/View.php';

class Router
{
    private $indexCtrl;

    public function __construct()
    {
        if(session_status()== PHP_SESSION_NONE){
            session_start();
        }
        $this->indexCtrl = new IndexController();
    }

    public function routing()
    {
			if(isset($_GET['action']))
			{
                if ($_GET['action'] === 'homepage') 
				{
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
                elseif ($_GET['action'] === 'logout')
				{
                    $this->indexCtrl->logout();
                }
				elseif($_GET['action'] === 'suivi')
				{
					$this->indexCtrl->Suivi();
				}
				elseif ($_GET['action'] === 'order')
				{
                    $this->indexCtrl->order();
                }
                elseif ($_GET['action'] === 'shoppingCart')
				{
                    $this->indexCtrl->shoppingCart();	
                }
				elseif($_GET['action'] === 'Prospect')
				{
					$this->indexCtrl->Prospect();

				}
				elseif($_GET['action'] === 'validation')
				{
					$this->indexCtrl->Validation();
				}
				elseif ($_GET['action'] === "adminCustomers"){
                    if(empty($_GET['modify'])) {
                        $this->indexCtrl->administrationCustomers();
                    }
                    else{
                        $this->indexCtrl->updateCustom();
                    }
                }


			}else
			{
				$this->indexCtrl->homepage();
			}
		
    }

    //ajout commentaire
}