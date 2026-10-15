-- =========================================================
-- APUNTES SQL / MYSQL: crear, consultar, insertar, modificar
-- =========================================================

-- Crear una base de datos
CREATE DATABASE practica
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- Seleccionar la base de datos
USE practica;

-- Crear una tabla
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    age INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar registros
INSERT INTO users (name, email, age)
VALUES ('Ana', 'ana@example.com', 25);

INSERT INTO users (name, email, age)
VALUES
    ('Luis', 'luis@example.com', 30),
    ('Marta', 'marta@example.com', 22);

-- Consultar todas las columnas y filas
SELECT * FROM users;

-- Elegir columnas concretas
SELECT name, email FROM users;

-- Filtrar filas
SELECT * FROM users WHERE age >= 25;
SELECT * FROM users WHERE name = 'Ana';

-- Operadores: =, !=, <>, >, <, >=, <=
-- AND: ambas condiciones; OR: una de ellas; NOT: negar condición
SELECT * FROM users
WHERE age >= 18 AND age < 30;

-- Buscar coincidencias parciales
SELECT * FROM users WHERE name LIKE 'M%'; -- empieza por M
SELECT * FROM users WHERE name LIKE '%a%'; -- contiene a

-- Ordenar y limitar resultados
SELECT * FROM users ORDER BY name ASC;
SELECT * FROM users ORDER BY created_at DESC LIMIT 5;

-- Modificar: ¡usa WHERE para no cambiar todas las filas!
UPDATE users
SET age = 26
WHERE id = 1;

-- Eliminar: ¡usa WHERE para no borrar todas las filas!
DELETE FROM users
WHERE id = 1;

-- Agregaciones
SELECT COUNT(*) AS total FROM users;
SELECT AVG(age) AS edad_media FROM users;
SELECT MIN(age) AS edad_minima, MAX(age) AS edad_maxima FROM users;

-- Agrupar resultados
SELECT age, COUNT(*) AS total
FROM users
GROUP BY age;

-- Relación entre tablas mediante clave foránea
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(150) NOT NULL,
    status VARCHAR(30) NOT NULL DEFAULT 'pendiente',
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- JOIN: combinar tareas con su usuario
SELECT tasks.title, tasks.status, users.name
FROM tasks
INNER JOIN users ON tasks.user_id = users.id;

-- LEFT JOIN incluye también usuarios sin tareas
SELECT users.name, tasks.title
FROM users
LEFT JOIN tasks ON tasks.user_id = users.id;

-- Conceptos:
-- PRIMARY KEY: identificador único.
-- FOREIGN KEY: referencia a otra tabla.
-- NOT NULL: obliga a proporcionar un valor.
-- UNIQUE: evita duplicados en esa columna.
-- DEFAULT: valor por defecto.
-- No concatenes entradas del usuario directamente en SQL:
-- en PHP utiliza PDO::prepare() y execute() con parámetros.
