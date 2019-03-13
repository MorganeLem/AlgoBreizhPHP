<?php

require_once 'Manager.php';

class AdminCustomersManager extends Manager
{

    public function getCustomers()
    {
        $sql = 'SELECT *
                FROM customers
                WHERE statut = ?';
        $request = $this->queryExecute($sql, array("Clients"));
        $users = $request->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    public function DelCustomer()
    {
        $sql ='Delete From customers 
                Where id = ?';
        $this->queryExecute($sql, array($_GET["id"]));
    }

    public function getCustomer()
    {
        $sql = 'SELECT firstname, lastname, email
                FROM customers
                WHERE id = ?';
        $request = $this->queryExecute($sql, array($_GET['id']));
        $user = $request->fetchObject();

        return $user;
    }

    public function updateCustomer(){
        $sql = "UPDATE customers
                SET firstname = ?, lastname = ?, email = ?
                WHERE id = ?";
        $this->queryExecute($sql, array($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_GET['id']));
    }

}
