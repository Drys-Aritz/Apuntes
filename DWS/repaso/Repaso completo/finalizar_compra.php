<?php
session_start();
require_once 'includes/conexion.php';
require_once 'includes/funciones_bd.php';
require_once 'includes/funciones.php';
$mensaje = '';
// TODO: permitir la compra solo a usuarios identificados.
// TODO: aceptar confirmaciones únicamente mediante POST y exigir carrito no vacío.
// TODO: llamar a registrarPedido($conexion, $idUsuario, $carrito).
// Esa función de BD deberá usar transacción, comprobar/bloquear stock,
// guardar pedido y líneas, descontar existencias y confirmar con COMMIT.
// Si hay errores, ROLLBACK. No confiar en precios de la sesión.
// TODO: vaciar el carrito solo si se confirma el pedido.
require_once 'includes/header.php';
?>
<h2>Resultado de la compra</h2>
<?php if ($mensaje): ?><p class="mensaje"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<a href="catalogo.php">Volver al catálogo</a>
<?php require_once 'includes/footer.php'; ?>
