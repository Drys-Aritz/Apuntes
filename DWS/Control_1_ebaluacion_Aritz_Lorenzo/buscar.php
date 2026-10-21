<?php
require_once __DIR__ . '/funciones.php';
$tituloPagina = 'Encontrar series';
$busqueda = '';
$resultados = [];

if (isset($_GET['titulo'])) {
    $busqueda = trim($_GET['titulo']);
}

if ($busqueda != '') {
    foreach ($series as $serie) {
        if (stripos($serie['titulo'], $busqueda) !== false) {
            $resultados[] = $serie;
        }
    }
}

require __DIR__ . '/includes/header.php';
?>
<form action="buscar.php" method="get">
    <label for="titulo">Título de la serie</label>
    <input type="text" id="titulo" name="titulo" value="<?php echo escapar($busqueda); ?>">
    <button type="submit">Buscar</button>
</form>

<?php if ($busqueda != '') { ?>
    <?php if (count($resultados) > 0) { ?>
        <p>Resultados para "<?php echo escapar($busqueda); ?>"</p>
        <section class="serieak">
            <?php
            foreach ($resultados as $serie) {
                mostrarSerie($serie);
            }
            ?>
        </section>
    <?php } else { ?>
        <p role="status">No se han encontrado series con ese título.</p>
    <?php } ?>
<?php } ?>
<?php require __DIR__ . '/includes/footer.php'; ?>