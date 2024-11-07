<?php

include 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $documento = $_POST['documento'];

    // Verificar si ya existe un cliente con ese documento
    $check_sql = "SELECT * FROM ClienteVehículo WHERE Documento = '$documento'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        $mensaje = "Ya existe un cliente con ese documento de identificación.";
    } else {
        $sql = "INSERT INTO ClienteVehículo (Nombre, Apellido, Dirección, Teléfono, Email, Documento) 
                VALUES ('$nombre', '$apellido', '$direccion', '$telefono', '$email', '$documento')";

        if ($conn->query($sql) === TRUE) {
            $mensaje = "Cliente registrado con éxito.";
        } else {
            $mensaje = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes - Taller Automotriz</title>
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
        <h2 class="text-3xl font-bold mb-4">Registro de Clientes</h2>
        
        <?php if (isset($mensaje)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?php echo $mensaje; ?></span>
            </div>
        <?php endif; ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                    Nombre
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" type="text" name="nombre" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="apellido">
                    Apellido
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="apellido" type="text" name="apellido" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">
                    Dirección
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="direccion" type="text" name="direccion" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="telefono">
                    Teléfono
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="telefono" type="tel" name="telefono" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Correo Electrónico
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="documento">
                    Documento de Identificación
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="documento" type="text" name="documento" required>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Registrar Cliente
                </button>
            </div>
        </form>
    </div>
</body>
</html>