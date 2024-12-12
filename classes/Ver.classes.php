<?php
class Ver extends Db
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

    public function existe($id){
        $query = $this->conn()->prepare("SELECT COUNT(*) as total FROM `Personas` WHERE `id` = :id");
        $query->bindParam('id', $id);

        $query->execute();
        $filas = $query->fetch(PDO::FETCH_ASSOC);
        $existe = $filas['total']==0 ? false : true;
        return $existe;
    }

    private function queryPersona($id)
    {
        $query = $this->conn()->prepare("SELECT `nombre`,`apellido` FROM `Personas` WHERE `id` = :id");
        $query->bindParam('id', $id);

        $query->execute();
        $persona = $query->fetch(PDO::FETCH_ASSOC);

        return $persona;
    }

    private function queryAtributos($id)
    {
        $query = $this->conn()->prepare("SELECT `dato`,`valor` FROM `Atributos` WHERE `id` = :id");
        $query->bindParam('id', $id);

        $query->execute();
        $persona = $query->fetchAll(PDO::FETCH_ASSOC);

        return $persona;
    }
}
