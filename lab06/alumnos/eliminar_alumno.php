<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Obtenemos los valores del formulario
$id = $_POST['id_alumno'];

// Formamos la consulta SQL
$sql = "DELETE FROM alumno WHERE alumno_id = $id";

// Ejecutamos la consulta
$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexión
desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Alumno</title>
</head>
<body>
    <h1>Nuevo alumno</h1>
    <h3>
        <?php

        if (!$resultado) {
            echo 'El alumno no fue eliminado';
        }
        else {
            echo 'El alumno ha sido eliminado';
        }

        ?>
    </h3>
    <a href="alumnos.php">Regresar</a>
</body>
</html>