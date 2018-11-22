<?php
require_once 'View/View.php';
require_once 'Model/ConnectionManager.php';
require_once 'Model/RegistrationManager.php';

class IndexController
{
    private $customer;
    private $registration;

    public function __construct()
    {
        $this->customer     = new ConnectionManager();
        $this->registration = new RegistrationManager();

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
                $isValid = $this->registration->addCustomer();
                if ($isValid) {
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
