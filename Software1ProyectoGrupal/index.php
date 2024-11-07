<?php  
      include 'db_connection.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller Automotriz</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Taller Automotriz Jcars</h1>
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
        <h2 class="text-3xl font-bold mb-4">Bienvenido al Sistema de Gestión del Taller Automotriz</h2>
        <p class="mb-4">Seleccione una opción del menú para comenzar.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-xl font-bold mb-2">Clientes</h3>
                <p>Gestionar información de clientes y vehículos.</p>
                <a href="clientes.php" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ver Clientes</a>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-xl font-bold mb-2">Órdenes de Trabajo</h3>
                <p>Crear y gestionar órdenes de trabajo.</p>
                <a href="ordenes.php" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ver Órdenes</a>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-xl font-bold mb-2">Inventario</h3>
                <p>Gestionar el inventario de productos.</p>
                <a href="inventario.php" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ver Inventario</a>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-xl font-bold mb-2">Facturas</h3>
                <p>Ver y gestionar facturas y pagos.</p>
                <a href="facturas.php" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ver Facturas</a>
            </div>
        </div>
    </div>
</body>
</html>