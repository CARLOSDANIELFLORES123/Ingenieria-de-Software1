<?php

include 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST['matricula'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $anio = $_POST['anio'];
    $tipo = $_POST['tipo'];
    $id_cliente = $_POST['id_cliente'];

    // Verificar si ya existe un vehículo con esa matrícula
    $check_sql = "SELECT * FROM ClienteVehículo WHERE Placa = '$matricula'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        $mensaje = "Ya existe un vehículo con esa matrícula.";
    } else {
        $sql = "INSERT INTO ClienteVehículo (Placa, Marca, Modelo, Año, Tipo, ID_ClienteVehículo) 
                VALUES ('$matricula', '$marca', '$modelo', $anio, '$tipo', $id_cliente)";

        if ($conn->query($sql) === TRUE) {
            $mensaje = "Vehículo registrado con éxito.";
        } else {
            $mensaje = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Obtener lista de clientes para el select
$clientes_sql = "SELECT ID_ClienteVehículo, CONCAT(Nombre, ' ', Apellido) as NombreCompleto FROM ClienteVehículo";
$clientes_result = $conn->query($clientes_sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Vehículos - Taller Automotriz</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Taller Automotriz</h1>
            <ul class="flex space-x-4">
                <li><a href="index.php" class="hover:underline">Inicio</a></li>
                <li><a href="clientes.php" class="hover:underline">Clientes</a></li>
                <li><a href="ordenes.php" class="hover:underline">Órdenes de Trabajo</a></li>
                <li><a href="inventario.php" class="hover:underline">Inventario</a></li>
                <li><a href="facturas.php" class="hover:underline">Facturas</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-4">
        <h2 class="text-3xl font-bold mb-4">Registro de Vehículos</h2>
        
        <?php if (isset($mensaje)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?php echo $mensaje; ?></span>
            </div>
        <?php endif; ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="matricula">
                    Matrícula
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="matricula" type="text" name="matricula" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="marca">
                    Marca
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="marca" type="text" name="marca" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="modelo">
                    Modelo
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="modelo" type="text" name="modelo" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="anio">
                    Año
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="anio" type="number" name="anio" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tipo">
                    Tipo de Vehículo
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tipo" type="text" name="tipo" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id_cliente">
                    Cliente
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="id_cliente" name="id_cliente" required>
                    <?php
                    while ($cliente = $clientes_result->fetch_assoc()) {
                        echo "<option value='" . $cliente['ID_ClienteVehículo'] . "'>" . $cliente['NombreCompleto'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Registrar Vehículo
                </button>
            </div>
        </form>
    </div>
</body>
</html>