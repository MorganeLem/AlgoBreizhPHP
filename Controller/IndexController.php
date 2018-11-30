<?php
require_once 'View/View.php';
require_once 'Model/ConnectionManager.php';
require_once 'Model/RegistrationManager.php';
require_once 'Model/SuiviManager.php';

class IndexController
{
    private $customer;
    private $registration;

    public function __construct()
    {
        $this->customer     = new ConnectionManager();
        $this->registration = new RegistrationManager();
		$this->suivi		= new SuiviManager();

    }

    public function homepage()
    {
        $vue = new Vue("homepageView");
        $vue->generer(array());
    }
	
	public function registration()
	{
		$vue = new Vue("registrationView");
        if(!empty($_POST)){

            if(empty($_POST['Nom']) || empty($_POST['Prenom']) || empty($_POST['Email']) || empty($_POST['CodeClient'])){

                if(empty($_POST['Nom'])){
                    $_SESSION['flash']['danger'] = 'Vous devez renseigner votre nom.';
                }

                elseif(empty($_POST['Prenom'])){
                    $_SESSION['flash']['danger'] = 'Vous devez renseigner votre prénom.';
                }

                elseif(empty($_POST['Email'])){
                    $_SESSION['flash']['danger'] = 'Vous devez renseigner votre email.';
                }
                elseif(empty($_POST['CodeClient'])) {
                    $_SESSION['flash']['danger'] = 'Vous devez renseigner le code client que nous vous avons fourni.';
                }

                $vue->generer(array());

            }
            else {
                $pwd = rand(10000, 99999);

                if ($isValid = $this->registration->addCustomer($pwd)) {

                    require_once 'View/mailRegistration.php';

                    $_SESSION['flash']['success'] = 'Un email contenant votre mot de passe vous a été envoyé.';

                    $this->homepage();



                } else {
                    $_SESSION['flash']['danger'] = 'Code client erroné.';
                    $vue->generer(array());
                }
            }
        } else{
            $vue->generer(array());
        }
	}

	public function Suivi()
	{
		if(session_status()== PHP_SESSION_NONE){
            session_start();
        }
		
		$vue = new Vue("SuiviView");
		if(!empty($_GET['suivi']) & empty($_GET['id']))
		{
			$result = $this->suivi->Suivi($_GET['suivi'],$_SESSION['user']->id);
			$legende = "<legend>Bienvenue dans votre suivi des ".$_GET['suivi']."s</legend>";
			$vue->generer(array('result' => $result , 'legende' => $legende));
		}
		if(!empty($_GET['id']))
		{
			$result = $this->suivi->SuiviDetails($_GET['suivi'], $_GET['id']);
			$legende = "<legend>Bienvenue dans votre suivi de la ".$_GET['suivi']." n° ".$_GET['id']."</legend>";
			$vue->generer(array('result' => $result , 'legende' => $legende));
		}
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
