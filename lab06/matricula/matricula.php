<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Consulta SQL
$sql = 'SELECT a.matricula_id, b.nombres , b.ape_paterno , c.nombre_curso , c.creditos FROM ((matricula a INNER JOIN alumno b ON a.alumno_id = b.alumno_id) INNER JOIN curso c ON a.curso_id = c.curso_id) ';

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.7/tailwind.min.css">
    <title>Alumnos</title>
</head>
<body class="bg-gray-200">
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Matricula</h1>

    <a href="agregar.html" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Nueva matricula</a>
    <table class="table-auto w-full">
        <thead>
            <tr class="bg-gray-400 text-white">
                <td class="px-4 py-2">Id</td>
                <td class="px-4 py-2">Nombres</td>
                <td class="px-4 py-2">Apellido Paterno</td>
                <td class="px-4 py-2">Curso</td>
                <td class="px-4 py-2">Créditos</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            <?php

            // Recorremos el array con los datos de los alumnos
            while ($matricula = mysqli_fetch_array($resultado)) {
                $matricula_id = $matricula['matricula_id'];
                $nombres = $matricula['nombres'];
                $ape_paterno = $matricula['ape_paterno'];
                $nombre_curso = $matricula['nombre_curso'];
                $creditos = $matricula['creditos'];

                echo '<tr>';
                echo '<td class="border px-4 py-2">' . $matricula_id . '</td>';
                echo '<td class="border px-4 py-2">' . $nombres . '</td>';
                echo '<td class="border px-4 py-2">' . $ape_paterno . '</td>';
                echo '<td class="border px-4 py-2">' . $nombre_curso . '</td>';
                echo '<td class="border px-4 py-2">' . $creditos . '</td>';
                echo '<td class="border px-4 py-2"><a href="#" class="text-blue-500 hover:text-blue-700">Editar</a> | <a href="#" class="text-red-500 hover:text-red-700">Eliminar</a></td>';
                echo '</tr>';
            }

            ?>
        </tbody>
    </table>
</div>
</body>
</html>