<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Consulta SQL
$sql = 'SELECT alumno_id, nombres, ape_paterno, ape_materno FROM alumno';

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
    <title>Alumnos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.7/tailwind.min.css">
</head>

<body class="bg-gray-200">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Alumnos</h1>

        <a href="../index.html" class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mb-4">Ir a la página principal</a>
        <a href="agregar.html" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Nuevo alumno</a>

        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-400 text-white">
                    <th class="px-4 py-2">Id</th>
                    <th class="px-4 py-2">Nombres</th>
                    <th class="px-4 py-2">Apellido Paterno</th>
                    <th class="px-4 py-2">Apellido Materno</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
            <tbody>
                <?php

                // Recorremos el array con los datos de los alumnos
                while ($alumno = mysqli_fetch_array($resultado)) {
                    $alumno_id = $alumno['alumno_id'];
                    $nombres = $alumno['nombres'];
                    $ape_paterno = $alumno['ape_paterno'];
                    $ape_materno = $alumno['ape_materno'];

                    echo '<tr>';
                    echo '<td class=" text-center border px-4 py-2">' . $alumno_id . '</td>';
                    echo '<td class="text-center border px-4 py-2">' . $nombres . '</td>';
                    echo '<td class="text-center border px-4 py-2">' . $ape_paterno . '</td>';
                    echo '<td class="text-center border px-4 py-2">' . $ape_materno . '</td>';
                    echo '<td class="text-center border px-4 py-2"><a href="/lab06/alumnos/editar.html" class="text-blue-500 hover:text-blue-700">Editar</a> | <a href="/lab06/alumnos/eliminar.html" class="text-red-500 hover:text-red-700">Eliminar</a></td>';
                    echo '</tr>';
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>