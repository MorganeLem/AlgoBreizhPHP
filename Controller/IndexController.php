<?php
require_once 'View/View.php';
require_once 'Model/ConnectionManager.php';
require_once 'Model/RegistrationManager.php';
require_once 'Model/SuiviManager.php';
require_once 'Model/OrderManager.php';

class IndexController
{
    private $customer;
    private $registration;
    private $suivi;
    private $order;

    public function __construct()
    {
        if(session_status()== PHP_SESSION_NONE){
            session_start();
        }
        $this->customer     = new ConnectionManager();
        $this->registration = new RegistrationManager();
		$this->suivi		= new SuiviManager();
		$this->order        = new OrderManager();

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

    public function order()
    {
        $vue = new Vue("orderView");
        $products = $this->order->getProducts();

        if(empty($_POST)){
            $vue->generer(array('products' => $products));
        }else{
            if(empty($_POST['product'])){
                $_SESSION['flash']['danger'] = "Vous n'avez pas sélectionné de plat";
                $vue->generer(array('products' => $products));
            }
            elseif (empty($_POST['qty'])){
                $_SESSION['flash']['danger'] = "Vous n'avez pas renseigné de quantité";
                $vue->generer(array('products' => $products));
            }
            else{
                $this->shoppingCart();
            }
        }
    }
    public function shoppingCart()
    {
        require_once 'Class/ShoppingCart.php';
        $shoppingCart = new ShoppingCart();
        $vue = new Vue('shoppingCartView');
        $totalOrderPrice = $shoppingCart->total();
        if(isset($_GET['add'])){
            $product = $this->order->getIdProduct();
            if(empty($product)){
                $_SESSION['flash']['danger'] = "Ce produit n'existe pas.";
                $this->order();
            }else{
                $shoppingCart->add($_GET['add']);
                $_SESSION['flash']['success'] = "Le produit a bien été ajouté au panier.<br /><a class='return' href='index.php?action=order'><span class='glyphicon glyphicon-chevron-right'> </span></glyphicon>Continuer mes achats</a>";
                $products = $this->order->getProductsByIds();
                $vue->generer(array('products' => $products, 'totalOrderPrice' => $totalOrderPrice));
            }
        }
        elseif(isset($_GET['del'])){
            $shoppingCart->del($_GET['del']);
            $products = $this->order->getProductsByIds();
            $vue->generer(array('products' => $products, 'totalOrderPrice' => $totalOrderPrice));
        }
        elseif(isset($_POST['shoppingCart']['qty'])){
            $shoppingCart->refresh();
            $products = $this->order->getProductsByIds();
            $vue->generer(array('products' => $products, 'totalOrderPrice' => $totalOrderPrice));
        }
        elseif(isset($_POST['orderValidation'])){
            $this->order->saveOrder($shoppingCart->total());
            $products = $this->order->getProductsByIds();

            foreach ($products as $product){
                $this->order->saveDetailsOrder($_SESSION['user']->id, $product->id, $_SESSION['shoppingCart'][$product->id], $product->price * $_SESSION['shoppingCart'][$product->id]);
            }
            $_SESSION['flash']['success'] = "Votre commande est enregistrée et va être traité dans les plus brefs délais";
            $_SESSION['shoppingCart'] = array();
            $products=false;
            $vue->generer(array('products' => $products));
        }
        else{
            $products = $this->order->getProductsByIds();
            $vue->generer(array('products' => $products, 'totalOrderPrice' => $totalOrderPrice));

        }
    }

    public function logout()
    {
        session_destroy();
        $_SESSION['flash']['danger'] = 'Vous êtes déconnecté.';
        $this->homepage();
    }
}
