<?php
session_start();
require_once 'includes/conexion.php';
require_once 'includes/funciones_bd.php'; // El alumnado creará este archivo.
require_once 'includes/funciones.php';

$busqueda = trim($_GET['busqueda'] ?? '');
$plataforma = $_GET['plataforma'] ?? '';
$orden = $_GET['orden'] ?? 'nombre';
$pagina = max(1, (int)($_GET['pagina'] ?? 1));

// TODO: validar plataforma y orden.
// TODO: llamar a buscarVideojuegos(...) con filtros, orden y paginación.
// TODO: recuperar también el total de resultados para calcular las páginas.
$videojuegos = [];
$totalPaginas = 1;

require_once 'includes/header.php';
?>
<h2>Catálogo de videojuegos</h2>
<form action="catalogo.php" method="GET">
    <label for="busqueda">Buscar por nombre</label>
    <input id="busqueda" name="busqueda" value="<?= htmlspecialchars($busqueda) ?>">
    <label for="plataforma">Plataforma</label>
    <select id="plataforma" name="plataforma">
        <?php foreach (['' => 'Todas', 'PC' => 'PC', 'PS5' => 'PS5', 'Xbox' => 'Xbox', 'Switch' => 'Switch'] as $valor => $texto): ?>
            <option value="<?= htmlspecialchars($valor) ?>" <?= $plataforma === $valor ? 'selected' : '' ?>><?= htmlspecialchars($texto) ?></option>
        <?php endforeach; ?>
    </select>
    <label for="orden">Orden</label>
    <select id="orden" name="orden">
        <option value="nombre">Nombre</option>
        <option value="precio_asc">Precio ascendente</option>
        <option value="precio_desc">Precio descendente</option>
    </select>
    <button type="submit">Buscar</button>
    <a class="boton" href="catalogo.php">Limpiar</a>
</form>
<table>
    <thead><tr><th>Nombre</th><th>Género</th><th>Plataforma</th><th>Precio</th><th>Stock</th><th>Acciones</th></tr></thead>
    <tbody>
    <?php foreach ($videojuegos as $juego): ?>
        <tr>
            <td><?= htmlspecialchars($juego['nombre']) ?></td>
            <td><?= htmlspecialchars($juego['genero']) ?></td>
            <td><?= htmlspecialchars($juego['plataforma']) ?></td>
            <td><?= number_format($juego['precio'], 2, ',', '.') ?> €</td>
            <td><?= (int)$juego['stock'] ?></td>
            <td><a href="detalle.php?id=<?= (int)$juego['id'] ?>">Ver detalles</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<!-- TODO: mostrar mensaje si no hay resultados y enlaces de paginación. -->
<?php require_once 'includes/footer.php'; ?>
