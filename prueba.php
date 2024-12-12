<?php
require "./classes/Db.classes.php";
// require "./classes/Ver.classes.php";
// $ver = new Ver();

// $personas = $ver->atributos(1);

class Prueba extends Db
{
    public function atributos($id)
    {
        $nombres = $this->queryPersona($id);
        $persona['nombre'] = $nombres['nombre'];
        $persona['apellido'] = $nombres['apellido'];

        $atributos = $this->queryAtributos($id);
        foreach ($atributos as $atributo) {
            $persona[$atributo['dato']] = $atributo['valor'];
        }

        return $persona;
    }

    function queryPersona($id)
    {
        $query = $this->conn()->prepare("SELECT `nombre`,`apellido` FROM `Personas` WHERE `id` = :id");
        $query->bindParam('id', $id);

        $query->execute();
        $persona = $query->fetchAll(PDO::FETCH_ASSOC);

        return $persona;

    }
    function queryAtributos($id)
    {
        $query = $this->conn()->prepare("SELECT `dato`,`valor` FROM `Atributos` WHERE `id` = :id");
        $query->bindParam('id', $id);

        $query->execute();
        $persona = $query->fetchAll(PDO::FETCH_ASSOC);

        return $persona;
    }
}
$persona = new Prueba();
print_r($persona->queryAtributos(1));
