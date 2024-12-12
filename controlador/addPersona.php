<?php
if (!isset($_POST['nombre']) || !isset($_POST['apellido'])) {
    header("Location: ../agregarPersona.php");
}

require "../classes/Db.classes.php";
require "../classes/addPersona.classes.php";

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
if (count($_POST) > 2) {
    foreach ($_POST as $dato => $valor) {
        if ($dato == "nombre" || $dato == "apellido") {
            continue;
        }
        if (!empty($valor)) {
            $array[$dato] = $valor;
        }
    }
} else {
    $array=false;
}

$add = new AddPersona($nombre,$apellido,$array);
header("Location: ../");
