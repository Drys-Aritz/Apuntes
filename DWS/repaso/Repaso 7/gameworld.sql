-- Creamos la base de datos si todavía no existe.
CREATE DATABASE IF NOT EXISTS gameworld
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- Seleccionamos la base de datos.
USE gameworld;

-- Eliminamos la tabla si ya existe para poder
-- volver a importar este archivo desde cero.
DROP TABLE IF EXISTS videojuegos;

-- Creamos la tabla de videojuegos.
CREATE TABLE videojuegos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    plataforma VARCHAR(30) NOT NULL,
    precio DECIMAL(6,2) NOT NULL,
    stock INT NOT NULL
);

-- Insertamos los videojuegos iniciales.
INSERT INTO videojuegos
(nombre, genero, plataforma, precio, stock)
VALUES
('Minecraft', 'Aventura', 'PC', 29.99, 8),
('EA Sports FC 25', 'Deportes', 'PS5', 49.99, 0),
('The Legend of Zelda', 'Aventura', 'Switch', 59.99, 5),
('Mario Kart 8', 'Carreras', 'Switch', 39.99, 12),
('God of War', 'Acción', 'PS5', 44.99, 0),
('Forza Horizon 5', 'Carreras', 'Xbox', 54.99, 7),
('Hollow Knight', 'Plataformas', 'PC', 14.99, 15),
('Stardew Valley', 'Simulación', 'PC', 13.99, 20),
('Spider-Man 2', 'Acción', 'PS5', 69.99, 4),
('Animal Crossing', 'Simulación', 'Switch', 49.99, 6);