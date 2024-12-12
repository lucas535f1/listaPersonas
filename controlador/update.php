<?php
if (!isset($_POST['id'])  || !isset($_POST['dato']) || !isset($_POST['valor'])) {
    header("Location: ../");
}
require "../classes/Db.classes.php";
require "../classes/Update.classes.php";
$update = new Update($_POST['id'], $_POST['dato'], $_POST['valor']);

if (!$update->existePersona()) {
    header("Location: ../");
}

if ($_POST['dato'] == "nombre") {
    $update->updateNombre();
} else if ($_POST['dato'] == "apellido") {
    $update->updateApellido();
} else {
    if (!$update->existeAtributo()) {
        header("Location: ../ver.php?id=" . $_POST['id']);
    }
    $update->updateAtributo();
}
header("Location: ../ver.php?id=" . $_POST['id']);
