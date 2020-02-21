<?php

namespace Core\Database;

use \PDO;

/**
 * acceder base de donne mysql
 */
class MysqlDatabase extends Database
{
    private $db_name;
    private $db_host;
    private $db_user;
    private $db_pass;
    private $pdo;

    public function __construct(string $db_name, string $db_host = 'localhost', string $db_user = 'root', string $db_pass = '')
    {
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }
    /**
     * Instancie l'objet PDO de PHP avec le design pattern singletton
     *
     * @return PDO
     */
    private function getPdo()
    {
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host, $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }
    /**
     * Executer use requete sql (la requete INSERT,UPDATE)
     *
     * @param string $statement requete
     * @return void table BD devient Objet
     */
    public function exec(string $statement)
    {
        $this->getPdo()->exec($statement);
    }
    /**
     * Executer use requete sql (la requete SELECT)
     *
     * @param string $statement requete
     * @param string $class_name nom du class associer a la table du BD
     * @param boolean $one un seul enregistrement recuperer si true
     * @return array table BD devient Objet
     */
    public function query(string $statement, string $class_name = null, bool $one = false)
    {
        $req = $this->getPdo()->query($statement);
        if ($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $data = $req->fetch();

        } else {
            $data = $req->fetchAll();
        }
        return $data;
    }
    /**
     * requete preparer pour eviter les injection sql
     *
     * @param string $statement requete
     * @param array $attributes listes des attributs recuperer dans les variables globales
     * @param string $class_name $class_name nom du class associer a la table du BD
     * @param boolean $one un seul enregistrement recuperer si true
     * @return void table BD devient Objet
     */
    public function prepare(string $statement, array $attributes, string $class_name = null, bool $one = false)
    {
        $req = $this->getPdo()->prepare($statement);
        $res = $req->execute($attributes);
        if (
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $res;
        }
        if ($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $data = $req->fetch();

        } else {
            $data = $req->fetchAll();
        }
        return $data;
    }

    /**
     * recupere l'id de la derniere enregistrement que l'on a ajouter
     *
     * @return void
     */
    public function lastInsertedId()
    {
        return $this->getPdo()->lastInsertId();
    }
}
