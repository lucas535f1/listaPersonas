<?php
if (!isset($_GET['id'])) {
    header("Location: ./");
}
require "./classes/Db.classes.php";
require "./classes/Ver.classes.php";
$ver = new Ver();
if(!$ver->existe($_GET['id'])){
    header("Location: ./");
}
$personas = $ver->atributos($_GET['id']);
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
    <title><?= $personas['nombre']?> <?= $personas['apellido']?></title>
</head>

<body>
    <header>
        <a href="./">Lista de personas</a>
    </header>
    <a class="volver" href="./">Volver</a>
    <section>
        <div>
            <a class="agregar" href="./agregarDato.php?id=<?= $_GET['id'] ?>">Agregar dato</a>
        </div>
        <table>
            <?php
            $par = "impar";
            foreach ($personas as $dato => $valor) {
            ?>
                <tr class="<?= $par ?>">
                    <td class="dato"><?= $dato ?>:</td>
                    <td> <?= $valor ?></td>
                    <td> <a href="modificar.php?id=<?= $_GET['id'] ?>&dato=<?= $dato ?>&valor=<?= $valor ?>">Modificar</a> </td>
                    <td><?php
                        if ($dato != "apellido" && $dato != "nombre") {
                        ?>
                            <a href="./controlador/deleteData.php?id=<?= $_GET['id'] ?>&dato=<?= $dato ?>">Eliminar</a>
                        <?php
                        } else {
                            echo "-";
                        }
                        ?>
                        </td>
                </tr>
            <?php
                $par = $par == "par" ? 'impar' : 'par';
            }
            ?>
        </table>
    </section>
</body>

</html>