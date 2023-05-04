<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Obtenemos los valores del formulario
$id = $_POST['id_matricula'];


// Formamos la consulta SQL
$sql = "DELETE FROM matricula WHERE matricula_id = $id";

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
    <title>Eliminacion de matricula</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.7/tailwind.min.css">
</head>
<body class="bg-gray-200">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Eliminacion de matricula</h1>
        <h3 class="mb-4">
            <?php
            if (!$resultado) {
                echo 'La matricula no fue registrado';
            }
            else {
                echo 'La matricula ha sido registrado';
            }
            ?>
        </h3>
        <a href="alumnos.php" class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mb-4">Regresar</a>
    </div>
</body>
</html>
