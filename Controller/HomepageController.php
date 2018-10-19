<?php
require_once 'View/View.php';

class HomepageController
{

    public function __construct()
    {

    }

    public function homepage()
    {
        $vue = new Vue("homepageView");
        $vue->generer(array());
    }
}