<?php

require_once 'Manager.php';

class ConnectionManager extends Manager{

    public function getCustomer()
    {
        $sql = 'SELECT *
                FROM customers
                WHERE email = ? or customer_code = ?';
        $request = $this->queryExecute($sql, array($_POST['login'], $_POST['login']));
        $user = $request->fetchObject();

        return $user;
    }
}