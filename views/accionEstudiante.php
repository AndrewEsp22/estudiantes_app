<?php
include __DIR__ . '/../models/estudiante.php';
include __DIR__ . '/../controllers/entityController.php';
include __DIR__ . '/../controllers/database/databaseController.php';
include __DIR__ . '/../controllers/estudiantes/estudianteController.php';

use App\models\Estudiante;
use App\controllers\estudiantes\EstudianteController;

$operacion = $_POST['operacion'];
$resultado = '';
$estudianteController= new EstudianteController();

if($operacion=='delete'){
    $resultado = $estudianteController->deleteItem($_POST['codigo']);
}else{
    $estudiante = new Estudiante();
    $estudiante->set('codigo', $_POST['codigo']);
    $estudiante->set('nombre', $_POST['nombre']);
    $estudiante->set('email', $_POST['email']);
    $resultado = $operacion=='update'
        ? $estudianteController->updateItem($estudiante)
        : $estudianteController->addItem($estudiante);
}

// si $resultado == true -> guardo el registro;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    echo $resultado;
    ?>
    <a href="../index.php">Ir al inicio</a>
</body>
</html>