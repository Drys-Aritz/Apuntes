<?php
session_start();
require_once 'includes/conexion.php';
require_once 'includes/funciones_bd.php';
require_once 'includes/funciones.php';
$mensaje = '';
// TODO: procesar POST y recuperar usuario mediante email (funciones_bd.php).
// TODO: comprobar la contraseña con password_verify().
// TODO: regenerar el ID de sesión y guardar id, nombre y rol.
// TODO: redirigir a index.php antes de mostrar HTML.
require_once 'includes/header.php';
?>
<h2>Iniciar sesión</h2>
<?php if ($mensaje): ?><p class="error"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<form action="login.php" method="POST">
    <label for="email">Correo electrónico</label><input type="email" id="email" name="email" required>
    <label for="password">Contraseña</label><input type="password" id="password" name="password" required>
    <button type="submit">Entrar</button>
</form>
<?php require_once 'includes/footer.php'; ?>
