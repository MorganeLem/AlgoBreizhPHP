<?php

require_once 'Manager.php';

class OrderManager extends Manager
{

    public function getProducts()
    {
        $sql = 'SELECT * FROM articles';
        $products = $this->queryExecute($sql, array());
        $products = $products->fetchAll(PDO::FETCH_OBJ);
        return $products;

    }

    public function getIdProduct(){
        $sql = 'SELECT id FROM articles WHERE id = ?';
        $productId = $this->queryExecute($sql, array($_GET['add']));

        $productId = $productId->fetchObject();

        return $productId;
    }

    public function getProductsByIds(){
        $ids= array_keys($_SESSION['shoppingCart']);
        if(empty($ids)) {
            return $products = array();
        }
        else{
            $sql = 'SELECT * FROM articles WHERE id IN ('.implode(',', $ids).')';
            $products = $this->queryExecute($sql, array());
            $products = $products->fetchAll(PDO::FETCH_OBJ);
            return $products;
        }

    }

    public function saveOrder($total){
        $sql = 'INSERT INTO salestable (id_customer, traitement, price, etats) VALUES (?, ?, ?, ?)';
        $globalOrder = $this->queryExecute($sql, array($_SESSION['user']->id, 'Non', $total, 'Commande'));
        return $globalOrder;
    }
    public function saveDetailsOrder($userId, $articleId, $qty, $price){
        $sql = 'SELECT id FROM salestable WHERE id_customer = ? ORDER BY date_purchase DESC LIMIT 1';
        $orderId = $this->queryExecute($sql, array($userId));
        $orderId = $orderId->fetch();
        $sql = 'INSERT INTO saleslines (id_sale, id_article, quantity, Prix_Ligne) VALUES(?,?,?,?)';

        $detailsOrder = $this->queryExecute($sql, array($orderId[0], $articleId, $qty, $price));


        return $detailsOrder;

    }
}