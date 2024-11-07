CREATE DATABASE TallerMecanico1;
USE TallerMecanico;

-- Tabla Servicios
CREATE TABLE Servicios (
    servicioID INT PRIMARY KEY AUTO_INCREMENT,
    nombreServicio VARCHAR(100),
    descripcionServicio TEXT,
    precioServicio DECIMAL(10, 2)
);

-- Tabla Pago
CREATE TABLE Pago (
    pagoID INT PRIMARY KEY AUTO_INCREMENT,
    fechaPago DATE,
    monto DECIMAL(10, 2),
    metodoPago VARCHAR(50)
);

-- Tabla Inventario
CREATE TABLE Inventario (
    inventarioID INT PRIMARY KEY AUTO_INCREMENT,
    nombreRepuesto VARCHAR(100),
    descripcionRepuesto TEXT,
    cantidad INT,
    precioUnitario DECIMAL(10, 2),
    stockMinimo INT
);

-- Tabla Empleado
CREATE TABLE Empleado (
    empleadoID INT PRIMARY KEY AUTO_INCREMENT,
    nombreEmpleado VARCHAR(100),
    cargoEmpleado VARCHAR(50),
    telefonoEmpleado VARCHAR(15),
    correoEmpleado VARCHAR(100),
    fechaContratacion DATE
);

-- Tabla ClienteVehiculo
CREATE TABLE Cliente (
    clienteVehiculoID INT PRIMARY KEY AUTO_INCREMENT,
    documentoCliente VARCHAR(20),
    nombreCliente VARCHAR(100),
    direccionCliente TEXT,
    telefonoCliente VARCHAR(15),
    correoCliente VARCHAR(100),
    matriculaVehiculo VARCHAR(20),
    marcaVehiculo VARCHAR(50),
    modeloVehiculo VARCHAR(50),
    añoVehiculoordenTrabajoID INT
);

-- Tabla OrdenTrabajo
CREATE TABLE OrdenTrabajo (
    ordenTrabajoID INT PRIMARY KEY AUTO_INCREMENT,
    clienteVehiculoID INT,
    fechaCreacion DATE,
    fechaEstimada DATE,
    estadoOrden VARCHAR(50),
    observaciones TEXT,
    empleadoID INT,
    FOREIGN KEY (clienteVehiculoID) REFERENCES Cliente(clienteVehiculoID),
    FOREIGN KEY (empleadoID) REFERENCES Empleado(empleadoID)
);

-- Tabla Factura
CREATE TABLE Factura (
    facturaID INT PRIMARY KEY AUTO_INCREMENT,
    ordenTrabajoID INT,
    fechaEmision DATE,
    total DECIMAL(10, 2),
    FOREIGN KEY (ordenTrabajoID) REFERENCES OrdenTrabajo(ordenTrabajoID)
);

-- Tabla OrdenProveedor
CREATE TABLE OrdenProveedor (
    ordenProveedorID INT PRIMARY KEY AUTO_INCREMENT,
    nombreProveedor VARCHAR(100),
    fechaOrden DATE,
    estadoOrden VARCHAR(50),
    total DECIMAL(10, 2)
);

-- Tabla DetalleOrden
CREATE TABLE DetalleOrden (
    detalleOrdenID INT PRIMARY KEY AUTO_INCREMENT,
    servicioID INT,
    ordenTrabajoID INT,
    cantidad INT,
    precioUnitario DECIMAL(10, 2),
    FOREIGN KEY (servicioID) REFERENCES Servicios(servicioID),
    FOREIGN KEY (ordenTrabajoID) REFERENCES OrdenTrabajo(ordenTrabajoID)
);

-- Tabla DetalleOrdenProveedor
CREATE TABLE DetalleOrdenProveedor (
    detalleOrdenProveedorID INT PRIMARY KEY AUTO_INCREMENT,
    ordenProveedorID INT,
    inventarioID INT,
    cantidad INT,
    precioUnitario DECIMAL(10, 2),
    FOREIGN KEY (ordenProveedorID) REFERENCES OrdenProveedor(ordenProveedorID),
    FOREIGN KEY (inventarioID) REFERENCES Inventario(inventarioID)
);


INSERT INTO Cliente (documentoCliente, nombreCliente, direccionCliente, telefonoCliente, correoCliente, matriculaVehiculo, marcaVehiculo, modeloVehiculo, añoVehiculo) VALUES
('12345678A', 'Saul Escobar', 'Av. Panoramica 12', '5551234', 'saul.escobar@email.com', 'ABC123', 'Toyota', 'Corolla', 2015),
('87654321B', 'Carlos Flores', 'Calle Secundaria 456', '5555678', 'carlos.flores@email.com', 'XYZ456', 'Honda', 'Civic', 2018),
('13579246C', 'Danner Rodrigo', 'Av. Central 789', '5556789', 'Danner.Rodrigo@email.com', 'LMN789', 'Ford', 'Focus', 2016),
('24681357D', 'Ana Torres', 'Calle Terciaria 321', '5553456', 'ana.torres@email.com', 'DEF321', 'Chevrolet', 'Cruze', 2017),
('98765432E', 'Luis Ramirez', 'Av. Cuarta 654', '5559876', 'luis.ramirez@email.com', 'GHI654', 'Nissan', 'Sentra', 2019);

select* from cliente;
INSERT INTO Inventario (nombreRepuesto, descripcionRepuesto, cantidad, precioUnitario, stockMinimo) VALUES
('Filtro de aire', 'Filtro de aire para motor', 50, 25.00, 10),
('Aceite de motor', 'Aceite sintético 5W-30', 30, 45.00, 5),
('Pastillas de freno', 'Pastillas de freno delanteras', 20, 35.00, 5),
('Bujías', 'Juego de bujías para motor', 40, 15.00, 10),
('Batería', 'Batería de 12V para automóvil', 10, 80.00, 2);
select* from inventario;

INSERT INTO OrdenTrabajo (clienteVehiculoID, fechaCreacion, fechaEstimada, estadoOrden, observaciones, empleadoID) VALUES
(1, '2024-01-01', '2024-01-10', 'En proceso', 'Revisión completa de motor', 1),
(2, '2024-02-05', '2024-02-12', 'Pendiente', 'Cambio de aceite y filtro', 2),
(3, '2024-03-15', '2024-03-20', 'Completada', 'Reparación del sistema de frenos', 3),
(4, '2024-04-01', '2024-04-10', 'Cancelada', 'Cambio de llantas', 4),
(5, '2024-05-12', '2024-05-18', 'En espera', 'Instalación de nuevo sistema de escape', 1);
