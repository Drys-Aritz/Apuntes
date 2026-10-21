<?php
require_once __DIR__ . '/funciones.php';
$tituloPagina = 'Añadir nueva serie';
$nuevaSerie = null;

if (isset($_POST['titulo'])) {
    $terminado = false;
    if ($_POST['terminado'] == 'true') {
        $terminado = true;
    }

    $nuevaSerie = [
        'titulo' => $_POST['titulo'],
        'genero' => $_POST['genero'],
        'temporadas' => $_POST['temporadas'],
        'valoracion' => $_POST['valoracion'],
        'terminado' => $terminado,
        'imagen' => 'img/img/default.jpg'
    ];

    $_SESSION['series_nuevas'][] = $nuevaSerie;
    $series[] = $nuevaSerie;
}

require __DIR__ . '/includes/header.php';
?>
<?php if ($nuevaSerie != null) { ?>
    <p>La serie se ha añadido correctamente.</p>
    <section class="serieak">
        <?php mostrarSerie($nuevaSerie); ?>
    </section>
<?php } ?>

<form action="anadir.php" method="post">
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" required>

    <label for="genero">Género:</label>
    <select id="genero" name="genero" required>
        <option value="Ciencia ficción">Ciencia ficción</option>
        <option value="Drama">Drama</option>
        <option value="Fantasía">Fantasía</option>
        <option value="Thriller">Thriller</option>
    </select>

    <label for="temporadas">Cantidad de temporadas:</label>
    <input type="number" id="temporadas" name="temporadas" min="1" required>

    <label for="valoracion">Valoración:</label>
    <input type="number" id="valoracion" name="valoracion" min="0" max="10" step="0.1" required>

    <label for="terminado">Estado:</label>
    <select id="terminado" name="terminado" required>
        <option value="false">Emitiendo</option>
        <option value="true">Terminado</option>
    </select>

    <button type="submit">Añadir serie</button>
</form>
<?php require __DIR__ . '/includes/footer.php'; ?>