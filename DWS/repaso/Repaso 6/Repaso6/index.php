<?php

// Cargamos la configuración de la tienda.
require_once "includes/datos.php";

// TODO 1:
// Recuperar la cookie del nombre.
// Si no existe, utilizar una cadena vacía.
$nombre = $_COOKIE["nombreUsuario"] ?? "";

// TODO 2:
// Recuperar el tema guardado en la cookie.
// Comprobar que pertenece al array $temas.
// Si no existe o no es válido, utilizar "claro".
$tema = $_COOKIE["tema"] ?? "claro";
if (!in_array($tema, $temas)) {
    $tema = "claro";
}

// TODO 3:
// Asignar los colores a estas dos variables:
// $colorFondo y $colorTexto.
//
// Tema claro: white y black.
// Tema oscuro: #222222 y white.
if ($tema == "claro") {
    $colorFondo = "white";
    $colorTexto = "white";
} else {
    $colorFondo = "#222222";
    $colorTexto = "white";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Codificación de caracteres. -->
    <meta charset="UTF-8">

    <!-- Título de la pestaña del navegador. -->
    <title>GameWorld - Inicio</title>

    <!-- Archivo CSS situado en la carpeta css. -->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<!--
    Los colores se aplican mediante variables PHP.
    Así podemos cambiar el tema sin modificar el CSS.
-->

<body style="background-color: <?php echo $colorFondo; ?>;
             color: <?php echo $colorTexto; ?>;">

    <h1>GameWorld</h1>

    <!-- Enlaces para navegar entre las páginas. -->
    <nav>
        <a href="index.php">Inicio</a>
        <a href="preferencias.php">Preferencias</a>
        <a href="catalogo.php">Catálogo</a>
        <a href="carrito.php">Carrito</a>
        <a href="cerrar.php">Cerrar sesión</a>
    </nav>

    <?php

    // TODO 4:
    // Si existe un nombre guardado, mostrar:
    // "Bienvenido/a, [nombre]".
    //
    // En caso contrario, mostrar:
    // "Bienvenido/a a GameWorld".
    //
    // Utilizar htmlspecialchars() para mostrar el nombre.
    if (!empty($nombre)){
        echo "Bienvenido/a, " . $nombre;
    } else {
        echo "Bienvenido/a a GameWorld";
    }
    ?>

    <p>Consulta nuestro catálogo de videojuegos.</p>

</body>

</html>