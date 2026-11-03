<?php
session_start();
require_once 'includes/conexion.php';
require_once 'includes/funciones_bd.php';
require_once 'includes/funciones.php';

// TODO: inicializar $_SESSION['carrito'] como array si todavía no existe.
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// TODO: procesar POST según la acción: anadir, actualizar o eliminar.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $accion = $_POST['accion'] ?? '';


    // TODO: validar id y cantidad y comprobar stock consultando funciones_bd.php.
    $id = filter_var(
        $_POST['id'] ?? 0,
        FILTER_VALIDATE_INT
    );

    $cantidad = filter_var(
        $_POST['cantidad'] ?? 0,
        FILTER_VALIDATE_INT
    );

    // TODO: guardar únicamente ID => cantidad en la sesión (no confiar en precios enviados).
    if ($juego && $cantidad > 0 && $cantidad <= $juego['stock']) {

        $_SESSION['carrito'][$id] = $cantidad;
    } elseif ($accion === 'anadir') {

        // TODO: recuperar precios y nombres desde la BD para construir $lineas.
        $juego = obtenerVideojuego($conexion, $id);

        if ($juego === null) {

            $mensaje = 'El videojuego no existe.';
        } else {
            $cantidadActual = $_SESSION['carrito'][$id] ?? 0;

            $nuevaCantidad = $cantidadActual + $cantidad;

            // TODO: calcular el total mediante una función reutilizable.

            if ($nuevaCantidad <= $juego['stock']) {

                $_SESSION['carrito'][$id] = $nuevaCantidad;
            } else {

                $mensaje = 'No hay suficiente stock.';
            }
        }
    }
}
$lineas = [];
$total = 0;

require_once 'includes/header.php';
?>
<h2>Mi carrito</h2>
<table>
    <thead>
        <tr>
            <th>Videojuego</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lineas as $linea): ?>
            <tr>
                <td><?= htmlspecialchars($linea['nombre']) ?></td>
                <td><?= number_format($linea['precio'], 2, ',', '.') ?> €</td>
                <td><?= (int)$linea['cantidad'] ?></td>
                <td><?= number_format($linea['subtotal'], 2, ',', '.') ?> €</td>
                <td>
                    <form action="carrito.php" method="POST">
                        <input type="hidden" name="id" value="<?= (int)$linea['id'] ?>">
                        <input type="number" name="cantidad" min="1" value="<?= (int)$linea['cantidad'] ?>" required>
                        <button name="accion" value="actualizar">Actualizar</button>
                        <button name="accion" value="eliminar">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<p><strong>Total: <?= number_format($total, 2, ',', '.') ?> €</strong></p>
<form action="finalizar_compra.php" method="POST">
    <button type="submit">Confirmar compra</button>
</form>
<?php require_once 'includes/footer.php'; ?>