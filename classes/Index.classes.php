<?php
class Index extends Db
{
    public function getArrayPersonas(){
        return $this->queryPersonas();
    }

    private function queryPersonas()
    {
        $query = $this->conn()->prepare("SELECT * FROM `Personas`");

        $query->execute();
        $personas = $query->fetchAll(PDO::FETCH_ASSOC);

        return $personas;
    }
}
