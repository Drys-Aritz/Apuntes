-- 1. Crear la base de datos
CREATE DATABASE taskflow
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- 2. Seleccionar la base de datos
USE taskflow;

-- 3. Crear la tabla de tareas
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT(1000),
    priority ENUM('baja', 'media', 'alta')
        NOT NULL DEFAULT 'media',
    status ENUM('pendiente', 'completada')
        NOT NULL DEFAULT 'pendiente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Insertar datos de ejemplo
INSERT INTO tasks (title, description, priority)
VALUES
('Revisar pedido', 'Comprobar el pedido del cliente', 'alta'),
('Actualizar web', 'Modificar la página principal', 'media'),
('Revisar formulario', 'Comprobar los campos obligatorios', 'baja');