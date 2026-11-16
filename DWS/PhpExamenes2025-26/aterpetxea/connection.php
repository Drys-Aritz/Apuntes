<?php
// Arrancamos la sesión para poder usar $_SESSION en todas las páginas
session_start();
// Servidor de la base de datos (en XAMPP es localhost)
$host = "localhost";
// Usuario de MySQL (en XAMPP es root)
$user = "root";
// Contraseña de MySQL (en XAMPP está vacía; en MAMP es "root")
$password = "";
// Nombre de la base de datos que importamos en phpMyAdmin
$database = "exam_aterpetxea";
// Creamos la conexión con la base de datos
$conn = mysqli_connect($host, $user, $password, $database);
// Si la conexión ha fallado...
if (!$conn) {
    // ...paramos todo y mostramos el error
    die("Errorea datu-basearekin konektatzean: " . mysqli_connect_error());
}
// Usamos UTF-8 para que se vean bien las tildes y la ñ
mysqli_set_charset($conn, "utf8mb4");
?>
