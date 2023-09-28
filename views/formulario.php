<?php
include __DIR__.'/../models/estudiante.php';
include __DIR__.'/../controllers/entityController.php';
include __DIR__.'/../controllers/database/databaseController.php';
include __DIR__.'/../controllers/estudiantes/estudianteController.php';

use App\controllers\estudiantes\EstudianteController;
use App\models\Estudiante;

$operacion = $_GET['operacion'];
$estudiante = new Estudiante();
if($operacion =='update'){
    $controlador = new EstudianteController();
    $estudiante = $controlador -> getItem($_GET['codigo']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
</head>
<body>
    <h1>Datos personales</h1>
    <?php
    if(!isset($estudiante)){
        echo '<p>El registro no existe </p>'; 
        die();
    }
    ?>
    <form action="accionestudiante.php" method="post">
        <input type="hidden" name="operacion" value="<?php echo $operacion; ?>">
        <div>
            <label>Código:</label>
            <input type="text" name="codigo" required value="<?php echo $estudiante->get('codigo');?>" >
        </div>
            <label>Nombre:</label>
            <input type="text" name="nombre" required value="<?php echo $estudiante->get('nombre');?>">
        </div>
        <div>
            <label>Email:</label>
            <input type="text" name="email" required value="<?php echo $estudiante->get('email');?>">
        </div>
        <div>
            <button type="submit">Guardar</button>
        </div>
    </form>
</body>
</html>