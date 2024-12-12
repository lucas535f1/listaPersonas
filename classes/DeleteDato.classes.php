<?php
class DeleteDato extends Db
{
    private $id;
    private $dato;

    function __construct($id, $dato)
    {
        $this->id = $id;
        $this->dato = $dato;
    }

    public function delete()
    {
        $query = $this->conn()->prepare("DELETE FROM`Atributos` WHERE `id` = :id AND `dato` = :dato");
        $query->bindParam('id', $this->id);
        $query->bindParam('dato', $this->dato);

        $query->execute();
    }

    public function existe()
    {
        $query = $this->conn()->prepare("SELECT COUNT(*) as total FROM `Atributos` WHERE `id` = :id AND `dato` = :dato");
        $query->bindParam('id', $this->id);
        $query->bindParam('dato', $this->dato);

        $query->execute();
        $filas = $query->fetch(PDO::FETCH_ASSOC);
        $existe = $filas['total'] == 0 ? false : true;
        return $existe;
    }
}
