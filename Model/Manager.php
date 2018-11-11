<?php

/**
 * Classe abstraite Manager.
 * Centralise les services d'accès à une base de données.
 * Utilise l'API PDO
 *
 */
abstract class Manager {

    /** Objet PDO d'accès à la BDD */
    private $db;

    /**
     * Exécute une requête SQL éventuellement paramétrée
     *
     * @param string $sql La requête SQL
     * @param array $params Les valeurs associées à la requête
     * @return PDOStatement Le résultat renvoyé par la requête
     */
    protected function queryExecute($sql, $params = null)
    {
        if ($params == null)
        {
            $result = $this->getdb()->query($sql); // exécution directe
        }
        else
        {
            $result = $this->getdb()->prepare($sql);  // requête préparée
            $result->execute($params);
        }
        return $result;
    }

    /**
     * Renvoie un objet de connexion à la BDD en initialisant la connexion au besoin
     *
     * @return PDO L'objet PDO de connexion à la BDD
     */
    public function getdb()
    {
        if ($this->db == null)
        {
            // Création de la connexion
            $this->db = new PDO('mysql:host=localhost;dbname=algobreizh_php;charset=utf8',
                'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->db;
    }

}
