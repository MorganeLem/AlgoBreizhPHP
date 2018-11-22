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
	
	public function Registration()
	{
		$sql =('SELECT customer_code FROM customers WHERE customer_code = ? && email = ?');
		$verifCodeClient = $this->queryExecute($sql, array($_POST['CodeClient'], $_POST['Email']));
		$resultat = $verifCodeClient->fetch();
		
		if(!empty($resultat))
		{
			$sql = 'UPDATE customers SET  lastname = ?, firstname = ? where customer_code = ? ';
			$this->queryExecute($sql , array($_POST['Prenom'], $_POST['Nom'], $_POST['CodeClient']));
			return $message = true;
		}else
		{
			return $message = false;
		}
	}
}