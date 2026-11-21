CREATE DATABASE IF NOT EXISTS tienda_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_spanish_ci;
ALTER DATABASE tienda_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_spanish_ci;

USE tienda_db;

CREATE TABLE IF NOT EXISTS productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  precio DECIMAL(10, 2) NOT NULL,
  stock INT NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;

INSERT INTO productos (nombre, precio, stock) VALUES
  ('Café molido', 6.50, 42),
  ('Aceite de oliva', 12.90, 18),
  ('Arroz bomba', 3.75, 35),
  ('Queso manchego', 15.20, 12),
  ('Galletas de chocolate', 2.40, 60);