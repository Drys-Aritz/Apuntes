<?php

// Configuración local de MySQL
$host = 'localhost';
$dbname = 'taskflow';
$user = 'root';
$password = ''; // Configuración habitual de XAMPP local

// Crear la conexión
$pdo = new PDO(
    "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
    $user,
    $password,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);