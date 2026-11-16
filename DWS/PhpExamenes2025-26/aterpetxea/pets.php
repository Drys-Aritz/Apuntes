<?php
// __DIR__ fija la ruta a la carpeta del proyecto.
require_once __DIR__ . '/connection.php';
/** @var mysqli $conn La conexión se crea en connection.php. */
// Cargamos las funciones
require_once __DIR__ . '/functions.php';
// Título de la pestaña
$pageTitle = "Maskotak";
// Mascotas no adoptadas (adopted = 0), las más antiguas primero
$notAdopted = getPets($conn, 0);
// Mascotas adoptadas (adopted = 1), las más antiguas primero
$adopted = getPets($conn, 1);
// Cargamos la cabecera con el menú
include __DIR__ . '/includes/header.php';
?>
<!-- Contenido principal -->
<main>
    <!-- Título de la primera sección -->
    <h2>ADOPTATZEKO DAUDEN MASKOTAK</h2>
    <?php
    // Pintamos las mascotas disponibles de 3 en 3 (o el mensaje si no hay)
    printPets($notAdopted, "Une honetan ez daukagu maskotarik adopziorako.");
    ?>
    <!-- Título de la segunda sección -->
    <h2>ADOPTATUTA DAUDEN MASKOTAK</h2>
    <?php
    // Pintamos las mascotas adoptadas de 3 en 3 (o el mensaje si no hay)
    printPets($adopted, "Ez dago adoptatutako maskotarik.");
    ?>
<!-- Fin del contenido principal -->
</main>
<?php
// Cargamos el pie de página
include __DIR__ . '/includes/footer.php';
?>
