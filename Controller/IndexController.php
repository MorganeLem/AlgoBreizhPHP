<?php
require_once 'View/View.php';
require_once 'Model/ConnectionManager.php';

class IndexController
{
    private $customer;

    public function __construct()
    {
        $this->customer = new ConnectionManager();

    }

    public function homepage()
    {
        $vue = new Vue("homepageView");
        $vue->generer(array());
    }
	
	public function registration()
	{
		$vue = new Vue("registrationView");
		if( isset($_POST['Nom']) & isset($_POST['Prenom']) & isset($_POST['Email']) & isset($_POST['CodeClient']))
		{
			$user = $this->customer->Registration();
			if($user == true)
			{
				$_SESSION['flash']['success'] = 'Vous êtes maintenant inscrit veuillez vous connecté. ';
			}else{
				$_SESSION['flash']['danger'] = 'Code client ou mot de passe incorrect ! ';
			}
			
		}
		$vue->generer(array());
	}

	public function connection()
    {
        if(session_status()== PHP_SESSION_NONE){
            session_start();
        }

        $vue = new Vue("connectionView");

        if(!empty($_POST)){

            if(!empty($_POST['login']) && !empty($_POST['pswd']))
            {

                $user = $this->customer->getCustomer();
                if($user->password === $_POST['pswd'])
                {
                    $_SESSION['user'] = $user;
                    $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté. ';
                    $this->homepage();
                }else
                    {
                        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect ! ';
                        $vue->generer(array());

                }

            }else
                {
                $_SESSION["flash"]["danger"] = "Vous devez renseigner tous les champs ! ";
                    $vue->generer(array());
            }
        }else{

            $vue->generer(array());
        }

    }

    public function logout(){
        session_start();
        session_destroy();
        $_SESSION['flash']['danger'] = 'Vous êtes déconnecté.';
        $this->homepage();
    }
}
