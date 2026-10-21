<?php
session_start();
require_once 'datos.php';

if (isset($_SESSION['series_nuevas'])) {
    foreach ($_SESSION['series_nuevas'] as $serieNueva) {
        $series[] = $serieNueva;
    }
}

function escapar($texto)
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

function mostrarSerie($serie)
{
?>
    <article class="seriea">
        <img src="<?php echo escapar($serie['imagen']); ?>" alt="<?php echo escapar($serie['titulo']); ?>">
        <div>
            <h2><?php echo escapar($serie['titulo']); ?></h2>
            <p><?php echo escapar($serie['genero']); ?></p>
            <p><?php echo $serie['temporadas']; ?> temporadas</p>
            <p>Valoración: <?php echo escapar($serie['valoracion']); ?></p>
            <?php if ($serie['terminado']) { ?>
                <p>Terminado</p>
            <?php } else { ?>
                <p>Emitiendo</p>
            <?php } ?>
        </div>
    </article>
<?php
}
