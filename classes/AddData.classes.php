<?php
class AddData extends Db
{
    private $id;
    private $dato;
    private $valor;

    function __construct($id, $dato, $valor)
    {
        $this->id = $id;
        $this->dato = $dato;
        $this->valor = $valor;
    }

    public function add()
    {
        $query = $this->conn()->prepare("INSERT INTO `Atributos`(`id`,`valor`,`dato`) VALUES (:id,:valor,:dato)");
        $query->bindParam('id', $this->id);
        $query->bindParam('dato', $this->dato);
        $query->bindParam('valor', $this->valor);

        $query->execute();
    }

    public function existe()
    {
        $query = $this->conn()->prepare("SELECT COUNT(*) as total FROM `Atributos` WHERE `id` = :id AND `dato` = :dato ");
        $query->bindParam('id', $this->id);
        $query->bindParam('dato', $this->dato);

        $query->execute();
        $filas = $query->fetch(PDO::FETCH_ASSOC);
        $existe = $filas['total'] == 0 ? false : true;
        return $existe;
    }
    public function valor()
    {
        return $this->valor;
    }
}
