<?php
require_once __DIR__ . '/funciones.php';
$tituloPagina = 'Estadísticas';
$totalSeries = count($series);
$seriesEnEmision = 0;
$sumaValoraciones = 0;
$serieMejorValorada = $series[0];

foreach ($series as $serie) {
    if ($serie['terminado'] == false) {
        $seriesEnEmision = $seriesEnEmision + 1;
    }

    $sumaValoraciones = $sumaValoraciones + $serie['valoracion'];

    if ($serie['valoracion'] > $serieMejorValorada['valoracion']) {
        $serieMejorValorada = $serie;
    }
}

$valoracionMedia = $sumaValoraciones / $totalSeries;

require __DIR__ . '/includes/header.php';
?>
<h2>Número total de series</h2>
<p><?php echo $totalSeries; ?></p>

<h2>Series en emisión</h2>
<p><?php echo $seriesEnEmision; ?></p>

<h2>Valoración media</h2>
<p><?php echo number_format($valoracionMedia, 2, '.', '.'); ?></p>

<h2>Serie mejor valorada</h2>
<p><?php echo escapar($serieMejorValorada['titulo']); ?> - <?php echo escapar($serieMejorValorada['valoracion']); ?></p>
<?php require __DIR__ . '/includes/footer.php'; ?>