<?php
session_start();
require_once 'includes/conexion.php';
require_once 'includes/funciones_bd.php';
require_once 'includes/funciones.php';

// TODO: inicializar $_SESSION['carrito'] como array si todavía no existe.
// TODO: procesar POST según la acción: anadir, actualizar o eliminar.
// TODO: validar id y cantidad y comprobar stock consultando funciones_bd.php.
// TODO: guardar únicamente ID => cantidad en la sesión (no confiar en precios enviados).
// TODO: recuperar precios y nombres desde la BD para construir $lineas.
// TODO: calcular el total mediante una función reutilizable.
$lineas = [];
$total = 0;

require_once 'includes/header.php';
?>
<h2>Mi carrito</h2>
<table>
    <thead><tr><th>Videojuego</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th><th>Acciones</th></tr></thead>
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
