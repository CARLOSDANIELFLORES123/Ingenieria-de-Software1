<?php
include 'db_connection.php';
// Consulta SQL
$sql = "SELECT * FROM Cliente";
$result = $conn->query($sql);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error en la consulta: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Taller Automotriz</title>
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
        <h2 class="text-3xl font-bold mb-4">Clientes y Vehículos</h2>
        <table class="w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">clienteVehiculoID</th>
                    <th class="py-3 px-6 text-left">documentoCliente</th>
                    <th class="py-3 px-6 text-left">nombreCliente</th>
                    <th class="py-3 px-6 text-left">direccionCliente</th>
                    <th class="py-3 px-6 text-left">telefonoCliente</th>
                    <th class="py-3 px-6 text-left">correoCliente</th>
                    <th class="py-3 px-6 text-left">matriculaVehiculo</th>
                    <th class="py-3 px-6 text-left">marcaVehiculo</th>
                    <th class="py-3 px-6 text-left">modeloVehiculo</th>
                    <th class="py-3 px-6 text-left">añoVehiculo</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                        echo "<td class='py-3 px-6 text-left whitespace-nowrap'>" . htmlspecialchars($row["clienteVehiculoID"]) . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row["documentoCliente"]) . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row["nombreCliente"]) . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row["direccionCliente"]) . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row["telefonoCliente"]) . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row["correoCliente"]) . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row["matriculaVehiculo"]) . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row["marcaVehiculo"]) . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row["modeloVehiculo"]) . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row["añoVehiculo"]) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='py-3 px-6 text-center'>No hay clientes registrados</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>