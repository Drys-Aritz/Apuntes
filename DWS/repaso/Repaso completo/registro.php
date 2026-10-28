<?php
session_start();
require_once 'includes/conexion.php';
require_once 'includes/funciones_bd.php';
require_once 'includes/funciones.php';
$mensaje = '';
// TODO: si se recibe POST, validar nombre, email y contraseña.
// TODO: comprobar si existe el email mediante una función de funciones_bd.php.
// TODO: usar password_hash() e insertar el usuario con rol cliente.
// TODO: informar de errores o redirigir a login.php.
require_once 'includes/header.php';
?>
<h2>Crear una cuenta</h2>
<?php if ($mensaje): ?><p class="error"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<form action="registro.php" method="POST">
    <label for="nombre">Nombre</label><input id="nombre" name="nombre" maxlength="100" required>
    <label for="email">Correo electrónico</label><input type="email" id="email" name="email" maxlength="150" required>
    <label for="password">Contraseña (mínimo 8 caracteres)</label><input type="password" id="password" name="password" minlength="8" required>
    <label for="repetir">Repetir contraseña</label><input type="password" id="repetir" name="repetir" required>
    <button type="submit">Registrarme</button>
</form>
<?php require_once 'includes/footer.php'; ?>
