<?php
if (!isset($_GET['id']) ) {
    header("Location: ./controlador/sesion.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Lucas Marsiglia">
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="./css/header.css">
    <title>Agregar dato</title>
</head>

<body>
    <header>
        <a href="./">Lista de personas</a>
    </header>
    <a class="volver" href="ver.php?id=<?= $_GET['id'] ?>">Volver</a>
    <section>
        <h2>Agregar dato</h2>

        <form action="./controlador/addData.php" method="post">
            <input type="text" name="id" readonly hidden value="<?= $_GET['id'] ?>">
            <div>
                <label for="dato">Dato:</label>
                <input type="texr" id="dato" name="dato" required placeholder="Ingrese dato" autocomplete="off">
            </div>
            <div>
                <label for="valor">Valor:</label>
                <input type="text" name="valor" required placeholder="Ingrese valor" autocomplete="off">
            </div>
            <div>
                <span></span>
                <button type="submit">Agregar</button>
            </div>
        </form>
    </section>
</body>

</html>