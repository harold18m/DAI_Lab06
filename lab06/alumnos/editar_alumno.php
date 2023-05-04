<?php
include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Obtenemos el id del alumno que se desea editar
$id = $_GET['id'];

// Consulta SQL para obtener los datos del alumno
$sql = "SELECT * FROM alumno WHERE alumno_id = $id";
$resultado = mysqli_query($conexion, $sql);

// Verificamos si se encontró el alumno con el id proporcionado
if (mysqli_num_rows($resultado) == 0) {
    // Si no se encontró el alumno, redireccionamos a la página de alumnos
    header('Location: alumnos.php');
    exit();
}

// Obtenemos los datos del alumno
$alumno = mysqli_fetch_array($resultado);
$nombres = $alumno['nombres'];
$ape_paterno = $alumno['ape_paterno'];
$ape_materno = $alumno['ape_materno'];

// Cerramos la conexión
desconectar($conexion);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar alumno</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.7/tailwind.min.css">
</head>

<body class="bg-gray-200">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Editar alumno</h1>
        
        <a href="alumnos.php" class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mb-4">Regresar a la lista de alumnos</a>

        <form action="guardar-edicion.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="nombres">
                    Nombres:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombres" type="text" name="nombres" value="<?php echo $nombres; ?>">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="ape_paterno">
                    Apellido paterno:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="ape_paterno" type="text" name="ape_paterno" value="<?php echo $ape_paterno; ?>">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="ape_materno">
                    Apellido materno:
                </label>
                <input type="text" name="ape_materno" id="ape_materno" value="<?php echo $ape_materno; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <input type="submit" value="Guardar cambios" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            </div>
        </form>
        <a href="index.php" class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancelar</a>

        </div>
        </div>
</body>
</html>
<?php

// Cerramos la conexión a la base de datos
desconectar($conexion);

?>
