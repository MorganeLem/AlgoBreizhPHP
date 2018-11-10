<?php

class ConnectionManager extends Manager{

    public function getCustomersLog($code)
    {
        $sql = 'SELECT email, password
                FROM customers
                WHERE code = ?';
        $codeCustomExist = $this->queryExecute($sql, array($code));
        return $codeCustomExist;
    }
}