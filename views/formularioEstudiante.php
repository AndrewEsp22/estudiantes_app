<?php
include __DIR__ . '/../models/estudiante.php';
include __DIR__ . '/../controllers/entityController.php';
include __DIR__ . '/../controllers/database/databaseController.php';
include __DIR__ . '/../controllers/estudiantes/estudianteController.php';

use App\models\Estudiante;
use App\controllers\estudiantes\EstudianteController;

$operacion = $_GET['operacion'];
$estudiante = new Estudiante();
if($operacion=='update'){
    $controlador = new EstudianteController();
    $estudiante = $controlador->getItem($_GET['codigo']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Datos de la persona</h1>
    <?php
        if(!isset($estudiante)){
            echo '<p>El registro no existe</p>';
            die();
        }
    ?>
    <form action="accionEstudiante.php" method="post">
        <input type="hidden" name="operacion" value="<?php echo $operacion; ?>">
        <div>
            <label>Código:</label>
            <input type="text" name="codigo" require value="<?php echo $estudiante->get('codigo'); ?>" <?php echo $operacion=='update'?'readonly':'';?>>
        </div>
        <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" require value="<?php echo $estudiante->get('nombre'); ?>">
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" require value="<?php echo $estudiante->get('email'); ?>">
        </div>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>