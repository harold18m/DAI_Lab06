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
<html>
<head>
	<title>CRUD Cursos</title>
	<!-- Incluimos Tailwind CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css">
</head>
<body>
	<div class="container mx-auto">
		<h1 class="text-3xl font-bold mb-4">Lista de Cursos</h1>
		<a href="create.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Agregar Curso</a>
		<table class="table-auto border">
			<thead>
				<tr>
					<th class="border px-4 py-2">ID</th>
					<th class="border px-4 py-2">Nombre del Curso</th>
					<th class="border px-4 py-2">Créditos</th>
					<th class="border px-4 py-2">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Conectamos a la base de datos
				$conexion = mysqli_connect("localhost", "usuario", "contraseña", "basededatos");
				// Consultamos todos los cursos
				$query = "SELECT * FROM cursos";
				$resultado = mysqli_query($conexion, $query);
				// Recorremos los resultados y los mostramos en la tabla
				while ($fila = mysqli_fetch_assoc($resultado)) {
					echo "<tr>";
					echo "<td class='border px-4 py-2'>" . $fila['id_curso'] . "</td>";
					echo "<td class='border px-4 py-2'>" . $fila['nombre_curso'] . "</td>";
					echo "<td class='border px-4 py-2'>" . $fila['creditos'] . "</td>";
					echo "<td class='border px-4 py-2'>";
					echo "<a href='edit.php?id=" . $fila['id_curso'] . "' class='bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2'>Editar</a>";
					echo "<a href='delete.php?id=" . $fila['id_curso'] . "' class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded'>Eliminar</a>";
					echo "</td>";
					echo "</tr>";
				}
				// Cerramos la conexión a la base de datos
				mysqli_close($conexion);
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
