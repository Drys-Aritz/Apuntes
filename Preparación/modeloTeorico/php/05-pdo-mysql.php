<?php
// =========================================================
// EJEMPLOS PDO + MYSQL
// Ejecutar en un servidor PHP con PDO MySQL habilitado.
// =========================================================

$host = "localhost";
$dbname = "practica";
$user = "root";
$password = "";

try {
    // Crear conexión a la base de datos
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    // SELECT: consultar todos los registros
    $stmt = $pdo->query("SELECT id, name, email FROM users");
    $users = $stmt->fetchAll();

    foreach ($users as $userRow) {
        echo htmlspecialchars($userRow["name"], ENT_QUOTES, "UTF-8");
    }

    // INSERT: consulta preparada con parámetros
    $stmt = $pdo->prepare(
        "INSERT INTO users (name, email) VALUES (:name, :email)"
    );
    $stmt->execute([
        "name" => "Ana",
        "email" => "ana@example.com"
    ]);

    // UPDATE: modificar un registro por su id
    $stmt = $pdo->prepare(
        "UPDATE users SET name = :name WHERE id = :id"
    );
    $stmt->execute([
        "name" => "Ana López",
        "id" => 1
    ]);

    // DELETE: eliminar un registro por su id
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->execute(["id" => 1]);

} catch (PDOException $e) {
    // En producción, registra detalles en el servidor; no los muestres al usuario.
    error_log($e->getMessage());
    echo "No se ha podido completar la operación.";
}
