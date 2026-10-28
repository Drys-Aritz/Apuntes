<?php
session_start();
require_once 'includes/conexion.php';
require_once 'includes/funciones_bd.php';
require_once 'includes/funciones.php';
// TODO: exigir sesión iniciada antes de generar HTML.
// TODO: llamar a obtenerPedidosUsuario($conexion, $idUsuario).
$pedidos = [];
require_once 'includes/header.php';
?>
<h2>Mis pedidos</h2>
<table>
    <thead><tr><th>Número</th><th>Fecha</th><th>Total</th></tr></thead>
    <tbody>
    <?php foreach ($pedidos as $pedido): ?>
        <tr>
            <td><?= (int)$pedido['id'] ?></td>
            <td><?= htmlspecialchars($pedido['fecha']) ?></td>
            <td><?= number_format($pedido['total'], 2, ',', '.') ?> €</td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<!-- TODO: mostrar las líneas de cada pedido mediante una función de BD. -->
<?php require_once 'includes/footer.php'; ?>
