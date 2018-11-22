<?php

class RegistrationManager extends Manager
{
    public function addCustomer()
    {
        $sql = 'SELECT customer_code 
                FROM customers
                WHERE customer_code = ?';
        $codeCustomExist = $this->queryExecute($sql, array($_POST['CodeClient']));

        if(!empty($codeCustomExist->fetch()))
        {
            $sql = $sql = 'UPDATE customers 
                SET email = ?, firstname = ?, lastname = ? 
                WHERE customer_code = ?';
            $this->queryExecute($sql , array($_POST['Email'], $_POST['Prenom'], $_POST['Nom'], $_POST['CodeClient']));
            return $message = true;
        }
        else
        {
            return $message = false;
        }
    }
}