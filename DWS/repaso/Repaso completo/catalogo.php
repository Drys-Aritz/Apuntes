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
$plataformasValidas = ['PC', 'PS5', 'Xbox', 'Switch'];

if (!in_array($plataforma, $plataformasValidas, true)) {
    $plataforma = '';
}

$ordenesValidos = ['nombre', 'precio_asc', 'precio_desc'];

if (!in_array($orden, $ordenesValidos, true)) {
    $orden = 'nombre';
}

// TODO: llamar a buscarVideojuegos(...) con filtros, orden y paginación.

function buscarVideojuegos($conexion, $busqueda, $plataforma, $orden, $pagina, $porPagina)
{

    // Solo permitimos estos órdenes
    $ordenes = [
        'nombre' => 'nombre ASC',
        'precio_asc' => 'precio ASC',
        'precio_desc' => 'precio DESC'
    ];

    $ordenSQL = $ordenes[$orden] ?? 'nombre ASC';

    // Calcular desde qué registro empezamos
    $offset = ($pagina - 1) * $porPagina;

    $sql = "SELECT * FROM videojuegos
            WHERE (? = '' OR nombre LIKE ?)
            AND (? = '' OR plataforma = ?)
            ORDER BY $ordenSQL
            LIMIT ? OFFSET ?";

    $stmt = $conexion->prepare($sql);

    $busquedaLike = "%$busqueda%";

    $stmt->bind_param(
        "ssssii",
        $busqueda,
        $busquedaLike,
        $plataforma,
        $plataforma,
        $porPagina,
        $offset
    );

    $stmt->execute();

    $resultado = $stmt->get_result();

    $videojuegos = $resultado->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    return $videojuegos;
}

// TODO: recuperar también el total de resultados para calcular las páginas.

function contarVideojuegos($conexion, $busqueda, $plataforma)
{

    $sql = "SELECT COUNT(*) AS total
            FROM videojuegos
            WHERE (? = '' OR nombre LIKE ?)
            AND (? = '' OR plataforma = ?)";

    $stmt = $conexion->prepare($sql);

    $busquedaLike = "%$busqueda%";

    $stmt->bind_param(
        "ssss",
        $busqueda,
        $busquedaLike,
        $plataforma,
        $plataforma
    );

    $stmt->execute();

    $resultado = $stmt->get_result();

    $fila = $resultado->fetch_assoc();

    $stmt->close();

    return (int)$fila['total'];
}


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
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Género</th>
            <th>Plataforma</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
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