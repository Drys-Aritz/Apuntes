<?php
// Cargamos la conexión del proyecto (así probamos la misma base de datos)
require_once __DIR__ . '/connection.php';
/** @var mysqli $conn La conexión se crea en connection.php. */
// Mostramos la versión de PHP
echo "<p>PHP: " . phpversion() . "</p>";
// Mostramos la base de datos a la que estamos conectados
echo "<p>Base de datos conectada: " . $database . "</p>";
// Consulta para leer todos los usuarios
$result = mysqli_query($conn, "SELECT username, password FROM users");
// Si la consulta falla, mostramos el error
if (!$result) {
    // Mostramos el error de MySQL
    die("Error en la consulta: " . mysqli_error($conn));
}
// Abrimos una tabla para mostrar los datos
echo "<table border='1' cellpadding='6'>";
// Cabecera de la tabla
echo "<tr><th>Usuario</th><th>Longitud hash</th><th>Empieza por</th><th>Vale 'password'?</th></tr>";
// Recorremos cada usuario
while ($row = mysqli_fetch_assoc($result)) {
    // Comprobamos si la contraseña "password" coincide con el hash
    $ok = password_verify("password", $row['password']) ? "SI" : "NO";
    // Pintamos la fila (htmlspecialchars por seguridad; entre corchetes para ver espacios)
    echo "<tr><td>[" . htmlspecialchars($row['username']) . "]</td><td>" . strlen($row['password']) . "</td><td>" . htmlspecialchars(substr($row['password'], 0, 7)) . "</td><td>" . $ok . "</td></tr>";
}
// Cerramos la tabla
echo "</table>";
?>