<?php
class Db
{
    private $server = "mysqlCT";
    private $username = "root";
    private $password = "root";
    private $db = "lista_personas";

    protected function conn()
    {
        try {
            $pdo = new PDO("mysql:host=$this->server;dbname=$this->db", $this->username, $this->password);
        } catch (PDOException $e) {
            die($e);
        }
        return $pdo;
    }
}
