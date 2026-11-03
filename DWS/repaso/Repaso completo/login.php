<?php
session_start();
require_once 'includes/conexion.php';
require_once 'includes/funciones_bd.php';
require_once 'includes/funciones.php';
$mensaje = '';
// TODO: procesar POST y recuperar usuario mediante email (funciones_bd.php).
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $usuario = obtenerUsuarioPorEmail($conexion, $email);

    // TODO: comprobar la contraseña con password_verify().
    if ($usuario !== null && password_verify($password, $usuario['password'])) {

        // TODO: regenerar el ID de sesión y guardar id, nombre y rol.
        session_regenerate_id(true);

        $_SESSION['id_usuario'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];

        // TODO: redirigir a index.php antes de mostrar HTML.
        header('Location: index.php');
        exit;
    } else {
        $mensaje = 'Email o contraseña incorrectos.';
    }
}

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