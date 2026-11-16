<?php
// Cargamos la conexión (y arranca la sesión)
require_once __DIR__ . '/connection.php';
// Borramos todas las variables de sesión
session_unset();
// Destruimos la sesión
session_destroy();
// Redirigimos al inicio (ya con el menú normal)
header("Location: index.php");
// Paramos el script tras redirigir
exit;
?>
