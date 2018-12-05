<?php
require_once 'Model/OrderManager.php';

class ShoppingCart
{
    private $order;

    public function __construct()
    {
        if(session_status()== PHP_SESSION_NONE){
            session_start();
        }

        $this->order = new OrderManager();

        if (!isset($_SESSION['shoppingCart'])){
            $_SESSION['shoppingCart'] = [];
        }
    }

    public function refresh(){
        foreach($_SESSION['shoppingCart'] as $product_id => $qty){
            if(isset($_POST['shoppingCart']['qty'][$product_id])){
                $_SESSION['shoppingCart'][$product_id] = $_POST['shoppingCart']['qty'][$product_id];
            }
        }
    }

    public function add($product_id){
        if (isset($_SESSION['shoppingCart'][$product_id])){
            $_SESSION['shoppingCart'][$product_id] ++;
        }
        else{
            $_SESSION['shoppingCart'][$product_id] = 1;
        }
    }

    public function del($product_id){

        unset($_SESSION['shoppingCart'][$product_id]);
        $_SESSION["flash"]["success"] = "Les articles ont été supprimés.";
    }

    public function total(){
        $total = 0;
        $products = $this->order->getProductsByIds();
        foreach( $products as $product ) {
            $total += $product->price * $_SESSION['shoppingCart'][$product->id];
        }
        return $total;
    }

}