<?php
class Update extends Db
{
    private $id;
    private $dato;
    private $valor;

    function __construct($id,$dato,$valor)
    {
        $this->id = $id;
        $this->dato = $dato;
        $this->valor = $valor;
    }

    public function updateNombre()
    {
        $query = $this->conn()->prepare("UPDATE `Personas` SET `nombre`= :valor WHERE `id` = :id");
        $query->bindParam('id', $this->id);
        $query->bindParam('valor', $this->valor);

        $query->execute();
    }

    public function updateApellido()
    {
        $query = $this->conn()->prepare("UPDATE `Personas` SET `apellido`= :valor WHERE `id` = :id");
        $query->bindParam('id', $this->id);
        $query->bindParam('valor', $this->valor);

        $query->execute();
    }

    public function updateAtributo()
    {
        $query = $this->conn()->prepare("UPDATE `Atributos` SET `valor`= :valor WHERE `id` = :id AND `dato`= :dato");
        $query->bindParam('id', $this->id);
        $query->bindParam('dato', $this->dato);
        $query->bindParam('valor', $this->valor);

        $query->execute();
    }

    public function existePersona(){
        $query = $this->conn()->prepare("SELECT COUNT(*) as total FROM `Personas` WHERE `id` = :id");
        $query->bindParam('id', $this->id);

        $query->execute();
        $filas = $query->fetch(PDO::FETCH_ASSOC);
        $existe = $filas['total']==0 ? false : true;
        return $existe;
    }

    public function existeAtributo()
    {
        $query = $this->conn()->prepare("SELECT COUNT(*) as total FROM `Atributos` WHERE `id` = :id AND `dato` = :dato ");
        $query->bindParam('id', $this->id);
        $query->bindParam('dato', $this->dato);

        $query->execute();
        $filas = $query->fetch(PDO::FETCH_ASSOC);
        $existe = $filas['total'] == 0 ? false : true;
        return $existe;
    }
}
