<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Obtenemos los valores del formulario
$id_curso = $_POST['id_curso'];
$id_alumno = $_POST['id_alumno'];


// Formamos la consulta SQL
$sql = "INSERT INTO matricula (curso_id, alumno_id) VALUES ('$id_curso', '$id_alumno')";

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
    <title>Nueva matrícula</title>
</head>
<body>
    <h1>Nueva matrícula</h1>
    <h3>
        <?php

        if (!$resultado) {
            echo 'La matrícula no fue registrada';
        }
        else {
            echo 'La matrícula ha sido registrada';
        }

        ?>
    </h3>
    <a href="/lab06/matricula/matricula.php">Regresar</a>
</body>
</html>