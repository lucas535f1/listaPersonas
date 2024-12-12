<?php

require "./classes/Db.classes.php";
require "./classes/Index.classes.php";
$index = new Index();

$personas = $index->getArrayPersonas();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Lucas Marsiglia">
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" href="./css/header.css">
    <title>Lista de personas</title>
</head>

<body>
    <header>
        <a href="./">Lista de personas</a>
    </header>
    <section>
        <div>
            <a class="agregar" href="agregarPersona.html">Agregar persona +</a>
        </div>

        <table>
            <?php
            $par = "impar";
            foreach ($personas as $persona) {
            ?>
                <tr class="<?= $par ?>">
                    <td><?= $persona['nombre'] ?> <?= $persona['apellido'] ?></td>
                    <td><a href="ver.php?id=<?= $persona['id'] ?>">Ver</a></td>
                    <td><a href="./controlador/delete.php?id=<?= $persona['id'] ?>">Eliminar</a></td>
                </tr>
            <?php
                $par = $par == "par" ? 'impar' : 'par';
            }
            ?>
        </table>
    </section>
</body>

</html>