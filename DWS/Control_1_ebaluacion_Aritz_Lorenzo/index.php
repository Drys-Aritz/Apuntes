<?php
$series = [];
require_once 'funciones.php';
$tituloPagina = 'Todas las series';
require 'includes/header.php';
?>
<section class="serieak">
    <?php
    foreach ($series as $serie) {
        mostrarSerie($serie);
    }
    ?>
</section>
<?php require 'includes/footer.php'; ?>