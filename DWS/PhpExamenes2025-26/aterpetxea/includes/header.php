<?php
// Si la página no ha definido título, ponemos uno por defecto
if (!isset($pageTitle)) {
    // Título por defecto
    $pageTitle = "Animalien aterpetxea";
}
?>
<!-- Tipo de documento HTML5 -->
<!DOCTYPE html>
<!-- Idioma de la página: euskera -->
<html lang="eu">
<!-- Inicio de la cabecera con datos de la página -->
<head>
    <!-- Codificación de caracteres -->
    <meta charset="UTF-8">
    <!-- Hace que la página se adapte al móvil -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título de la pestaña del navegador -->
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <!-- Enlace al archivo de estilos -->
    <link rel="stylesheet" href="css/style.css">
<!-- Fin de la cabecera -->
</head>
<!-- Inicio del cuerpo de la página -->
<body>
<!-- Cabecera visible con el título y el menú -->
<header>
    <!-- Título del sitio -->
    <h1>Animalien aterpetxea</h1>
    <!-- Menú de navegación -->
    <nav>
        <!-- Lista de enlaces del menú -->
        <ul>
            <!-- Enlace a Hasiera (inicio) -->
            <li><a href="index.php">Hasiera</a></li>
            <!-- Enlace a Maskotak -->
            <li><a href="pets.php">Maskotak</a></li>
            <?php
            // Si el administrador ha iniciado sesión, mostramos su menú
            if (isAdmin()) {
                // Enlace para cerrar sesión
                echo '<li><a href="sessionclose.php">Saioa Itxi</a></li>';
                // Saludo sin enlace con el nombre del usuario
                echo '<li><span>Kaixo ' . htmlspecialchars($_SESSION['admin_name']) . '</span></li>';
            // Si no ha iniciado sesión, mostramos el menú normal
            } else {
                // Enlace para iniciar sesión
                echo '<li><a href="sessiontart.php">Saioa Hasi</a></li>';
            }
            ?>
        <!-- Fin de la lista -->
        </ul>
    <!-- Fin del menú -->
    </nav>
<!-- Fin de la cabecera visible -->
</header>
