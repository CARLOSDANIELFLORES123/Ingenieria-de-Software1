<?php

include 'db_connection.php';
$sql = "SELECT f.ID_Factura, ot.ID_Orden, cv.Nombre, cv.Apellido, f.Fecha_Emisión, f.Monto_Total
        FROM Facturas f
        INNER JOIN Ordenes_Trabajo ot ON f.ID_Orden = ot.ID_Orden
        INNER JOIN ClienteVehículo cv ON ot.ID_ClienteVehículo = cv.ID_ClienteVehículo";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas - Taller Automotriz</title>
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
        <h2 class="text-3xl font-bold mb-4">Facturas</h2>
        <table class="w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID Factura</th>
                    <th class="py-3 px-6 text-left">ID Orden</th>
                    <th class="py-3 px-6 text-left">Cliente</th>
                    <th class="py-3 px-6 text-left">Fecha Emisión</th>
                    <th class="py-3 px-6 text-left">Monto Total</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                        echo "<td class='py-3 px-6 text-left whitespace-nowrap'>" . $row["ID_Factura"] . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . $row["ID_Orden"] . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . $row["Nombre"] . " " . $row["Apellido"] . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . $row["Fecha_Emisión"] . "</td>";
                        echo "<td class='py-3 px-6 text-left'>$" . number_format($row["Monto_Total"], 2) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='py-3 px-6 text-center'>No hay facturas registradas</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>