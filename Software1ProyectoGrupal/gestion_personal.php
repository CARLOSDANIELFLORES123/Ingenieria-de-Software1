<?php

include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cargo = $_POST['cargo'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];

    $sql = "INSERT INTO Empleados (Nombre, Apellido, Cargo, Teléfono, Email, Dirección) 
            VALUES ('$nombre', '$apellido', '$cargo', '$telefono', '$email', '$direccion')";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Empleado registrado con éxito.";
    } else {
        $mensaje = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener lista de empleados
$empleados_sql = "SELECT * FROM Empleado";
$empleados_result = $conn->query($empleado_sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta  charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Personal - Taller Automotriz</title>
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
        <h2 class="text-3xl font-bold mb-4">Gestión de Personal</h2>
        
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
                <label class="block text-gray-700 text-sm font-bold mb-2" for="cargo">
                    Cargo
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cargo" type="text" name="cargo" required>
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
                <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">
                    Dirección
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="direccion" type="text" name="direccion" required>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Registrar Empleado
                </button>
            </div>
        </form>

        <h3 class="text-2xl font-bold mt-8 mb-4">Lista de Empleados</h3>
        <table class="w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Nombre</th>
                    <th class="py-3 px-6 text-left">Apellido</th>
                    <th class="py-3 px-6 text-left">Cargo</th>
                    <th class="py-3 px-6 text-left">Teléfono</th>
                    <th class="py-3 px-6 text-left">Email</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php
                if ($empleados_result->num_rows > 0) {
                    while($row = $empleados_result->fetch_assoc()) {
                        echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                        echo "<td class='py-3 px-6 text-left whitespace-nowrap'>" . $row["Nombre"] . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . $row["Apellido"] . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . $row["Cargo"] . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . $row["Teléfono"] . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . $row["Email"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='py-3 px-6 text-center'>No hay empleados registrados</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>