    CREATE DATABASE ventas_php;

    USE ventas_php;

    CREATE TABLE productos(
        id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        codigo VARCHAR(255) NOT NULL,
        nombre VARCHAR(255) NOT NULL,
        compra DECIMAL(8,2) NOT NULL,
        venta DECIMAL(8,2) NOT NULL,
        existencia INT NOT NULL
    );

    CREATE TABLE clientes(
        id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(255) NOT NULL,
        telefono VARCHAR(25) NOT NULL,
        direccion VARCHAR(255) NOT NULL
    );

    CREATE TABLE usuarios(
        id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        usuario VARCHAR(50) NOT NULL,
        nombre VARCHAR(255) NOT NULL,
        telefono VARCHAR(25) NOT NULL,
        direccion VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL
    );

    INSERT INTO usuarios (usuario, nombre, telefono, direccion, password) VALUES ("paco", "PacoHunter", "6667771234", "Nowhere", "$2y$10$6zeiv5cq4/HCjWBH5X/Fd.yxKfDaWa5sJaYfW302n./awI/lQcH0i");

    CREATE TABLE ventas(
        id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        fecha DATETIME NOT NULL,
        total DECIMAL(9,2) NOT NULL,
        idUsuario BIGINT NOT NULL,
        idCliente BIGINT
    );  

    CREATE TABLE productos_ventas(
        id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        cantidad INT NOT NULL,
        precio DECIMAL(8,2) NOT NULL,
        idProducto BIGINT NOT NULL,
        idVenta BIGINT NOT NULL
    );


    INSERT INTO `clientes` (`id`, `nombre`, `telefono`, `direccion`) VALUES
    (4, 'Julia', '987456123', 'CL MANUEL GUIRIOR 1035, 15654 , Pueblo Libre'),
    (5, 'Julio Cesar', '965478369', 'JR MARIANO MELGAR 280 , 15442 ,Miraflores'),
    (6, 'Maryorie Mercer', '975375274', 'JR LLOQUE YUPANQUI 977 , 15643 , Jesús María '),
    (7, 'Daniela Yamilé', '987523488', 'CL CAMPAMENTO ATOCONGO MZ :I lote:1 , 15274 , Villa María del Triunfo'),
    (9, 'Michelle Tito', '965874141', 'CL JUAN CASTRO 542 CDR:5 UR :BALCONCILLO, 15984 , La Victoria'),
    (10, 'Antonio', '999852845', 'JR VENUS 120  , 15362 ,San Juan de Lurigancho'),
    (11, 'Carlos', '966588456', 'MZ G LT 4  LOS OLIVOS, 15834 , Los Olivos');

    INSERT INTO `productos` (`id`, `codigo`, `nombre`, `compra`, `venta`, `existencia`) VALUES
    (1, '111', 'Aceite', '6.00', '10.00', 49),
    (2, '222', 'Arroz', '2.00', '5.00', 50),
    (3, '333', 'Avena', '1.00', '3.00', 50),
    (4, '444', 'Atún', '3.00', '6.00', 99),
    (5, '555', 'Azúcar', '2.00', '5.00', 100),
    (6, '666', 'café', '3.00', '7.00', 100),
    (7, '112', 'Cereales', '5.00', '10.00', 100),
    (8, '113', 'Harina', '2.00', '5.00', 100),
    (9, '114', 'Gelatina Fresa', '1.00', '3.00', 100),
    (10, '115', 'Gelatina Naranja', '1.00', '3.00', 100),
    (11, '116', 'Flan', '1.00', '3.00', 100),
    (12, '117', 'Sal', '2.00', '3.00', 100),
    (13, '118', 'Kétchup', '4.00', '7.00', 100),
    (14, '119', 'Mayonesa', '4.00', '7.00', 99),
    (15, '123', 'Mostaza', '4.00', '7.00', 99),
    (16, '120', 'Mermelada', '3.00', '6.00', 100),
    (17, '121', 'Huevo packx12', '5.00', '9.00', 100),
    (18, '122', 'Mantequilla ', '3.00', '6.00', 100);

    INSERT INTO `productos_ventas` (`id`, `cantidad`, `precio`, `idProducto`, `idVenta`) VALUES
    (1, 1, '10.00', 1, 1),
    (2, 1, '7.00', 14, 1),
    (3, 1, '6.00', 4, 1),
    (4, 1, '7.00', 15, 1);

    INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `telefono`, `direccion`, `password`) VALUES
    (3, 'Lisett', 'Lisett Ovalle', '987654322', 'Mz A1 Lote 1', '$2y$10$RC9x1B79hfuO/AtMZPocSOkOB3R8SZevyoVSMf0ezgvyUGLiUvkqK'),
    (4, 'Maria', 'Maria Jose', '987547851', 'Los Olivos', '$2y$10$FYbX5YRu9BA/UWqjW/D5iOm.ooulKrSzqFCo/XpXrreK1eRWVfW5y');

    INSERT INTO `ventas` (`id`, `fecha`, `total`, `idUsuario`, `idCliente`) VALUES
    (1, '2024-02-25 01:38:17', '30.00', 3, 4);


