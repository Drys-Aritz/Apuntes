<?php
// require carga otro archivo; __DIR__ hace que la ruta no dependa de dónde se ejecute PHP.
require_once __DIR__ . '/connection.php';
/** @var mysqli $conn La conexión se crea en connection.php. */
// Cargamos nuestras funciones
require_once __DIR__ . '/functions.php';
// Título de la pestaña
$pageTitle = "Hasiera - Animalien aterpetxea";
// Pedimos las 3 razas más populares
$breeds = getPopularBreeds($conn);
// Pedimos los porcentajes de adopción
$adoption = getAdoptionPercentage($conn);
// Cargamos la cabecera con el menú
include __DIR__ . '/includes/header.php';
?>
<!-- Contenido principal de la página -->
<main>
    <!-- Caja de las razas populares -->
    <div class="box">
        <!-- Título de la caja -->
        <h2>Aterpetxeko arraza popularrenak</h2>
        <!-- Lista de razas -->
        <ul>
            <?php
            // Recorremos el array asociativo: $name es la raza y $count la cantidad
            foreach ($breeds as $name => $count) {
                // Mostramos la raza y cuántas mascotas tiene
                echo '<li>' . htmlspecialchars($name) . ': ' . $count . ' maskota</li>';
            }
            ?>
        <!-- Fin de la lista -->
        </ul>
    <!-- Fin de la caja -->
    </div>
    <!-- Caja del estado de las adopciones -->
    <div class="box">
        <!-- Título de la caja -->
        <h2>Adopzioen egoera</h2>
        <!-- Porcentaje de adoptadas -->
        <p>Adoptatuak: <?php echo $adoption['adoptatuak']; ?>%</p>
        <!-- Porcentaje de disponibles -->
        <p>Eskuragarri: <?php echo $adoption['eskuragarri']; ?>%</p>
        <!-- Barra visual con los dos porcentajes -->
        <div class="bar">
            <!-- Parte verde: adoptadas -->
            <div class="adopted" style="width: <?php echo $adoption['adoptatuak']; ?>%"><?php echo $adoption['adoptatuak']; ?>%</div>
            <!-- Parte naranja: disponibles -->
            <div class="available" style="width: <?php echo $adoption['eskuragarri']; ?>%"><?php echo $adoption['eskuragarri']; ?>%</div>
        <!-- Fin de la barra -->
        </div>
    <!-- Fin de la caja -->
    </div>
<!-- Fin del contenido principal -->
</main>
<?php
// Cargamos el pie de página
include __DIR__ . '/includes/footer.php';
?>
