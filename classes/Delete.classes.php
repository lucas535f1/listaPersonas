<?php
class Delete extends Db
{
    private $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    public function delete()
    {
        $query = $this->conn()->prepare("DELETE FROM `Personas` WHERE `id` = :id");
        $query->bindParam('id', $this->id);

        $query->execute();
    }

    public function existe()
    {
        $query = $this->conn()->prepare("SELECT COUNT(*) as total FROM `Personas` WHERE `id` = :id");
        $query->bindParam('id', $this->id);

        $query->execute();
        $filas = $query->fetch(PDO::FETCH_ASSOC);
        $existe = $filas['total'] == 0 ? false : true;
        return $existe;
    }
}
