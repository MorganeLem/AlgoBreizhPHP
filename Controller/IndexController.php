<?php
require_once 'View/View.php';

class IndexController
{

    public function __construct()
    {

    }

    public function homepage()
    {
        $vue = new Vue("homepageView");
        $vue->generer(array());
    }
	
	public function registration()
	{
		$vue = new Vue("registrationView");
		$vue->generer(array());
	}

	public function Connection()
    {
        $vue = new Vue("connectionView");
        $vue->generer(array());
    }
		
}