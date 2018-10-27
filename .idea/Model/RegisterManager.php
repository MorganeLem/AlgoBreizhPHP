<?php

class RegisterManager extends Manager
{
    public function getCustomerCode($code)
    {
        $sql = 'SELECT customer_code as code
                FROM customers
                WHERE code = ?';
        $codeCustomExist = $this->queryExecute($sql, array($code));
        return $codeCustomExist;
    }
    public function addCustomer($customerCode, $email, $password)
    {
        $sql = 'UPDATE customers 
                SET $email = ?, password = ?
                WHERE customer_code = ?';
        $addCustomer = $this->queryExecute($sql, array($email, $password, $customerCode));
        return $addCustomer;
    }
}