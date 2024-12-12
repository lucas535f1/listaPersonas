<?php
class AddPersona extends Db
{
    private $nombre;
    private $apellido;
    private $atributos;

    function __construct($nombre, $apellido, $array)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->atributos = $array;

        if ($this->atributos == false) {
            $this->addPersona();
        } else {
            $this->addAtributos($this->addPersona());
        }
    }
    private function addPersona()
    {
        $conn = $this->conn();
        $query = $conn->prepare("INSERT INTO `Personas` (`nombre`,`apellido`) VALUES  (:nombre , :apellido)");
        $query->bindParam('nombre', $this->nombre);
        $query->bindParam('apellido', $this->apellido);

        $query->execute();
        return $conn->lastInsertId();
    }

    private function addAtributos($id)
    {
        $query = $this->conn()->prepare("INSERT INTO `Atributos` (`id`,`dato`,`valor`) VALUES  (? ,? , ?)");

        foreach ($this->atributos as $dato => $valor) {
            $valores=[$id,$dato,$valor];
            $query->execute($valores);
        }
    }
}
