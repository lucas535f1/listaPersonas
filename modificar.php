<?php
if (!isset($_GET['id']) || !isset($_GET['valor']) || !isset($_GET['dato'])) {
    header("Location: ./");
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
    <title>Modificar dato</title>
</head>

<body>
    <header>
        <a href="./">Lista de personas</a>
    </header>
    <a class="volver" href="ver.php?id=<?= $_GET['id'] ?>">Volver</a>
    <section>
        <h2>Modificar dato</h2>
        <form action="./controlador/update.php" method="post">
            <input type="id" name="id" readonly hidden value="<?= $_GET['id'] ?>">
            <input type="id" name="dato" readonly hidden value="<?= $_GET['dato'] ?>">
            <div>
                <label for="valor"><?= $_GET['dato'] ?>:</label>
                <input type="id" name="valor" id="valor" required placeholder="Ingrese valor" autocomplete="off" value="<?= $_GET['valor'] ?>">
            </div>
            <div>
                <span></span>
                <button type="submit">Modificar</button>
            </div>
        </form>
    </section>
</body>

</html>