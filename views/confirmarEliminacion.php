<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="accionEstudiante.php" method="post">
        <h1>Confirmar operaición</h1>
        <p>¿Desea eliminar el registro?</p>
        <input type="hidden" name="codigo" value="<?php echo $_GET['codigo']?>">
        <input type="hidden" name="operacion" value="delete">
        <button type="submit">Si</button>
        <a href="../index.php">No</a>
    </form>
</body>
</html>