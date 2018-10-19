<?php

require_once 'HomepageController.php';
require_once 'View/View.php';

class Controller
{
    private $homepageCtrl;

    public function __construct()
    {
        $this->homepageCtrl = new HomepageController();
    }
    public function root()
    {
        $this->homepageCtrl->homepage();
    }
}