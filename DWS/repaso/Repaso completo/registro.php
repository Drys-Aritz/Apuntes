<?php

session_start();

require_once 'includes/conexion.php';
require_once 'includes/funciones_bd.php';
require_once 'includes/funciones.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. RECUPERAR DATOS
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $repetir = $_POST['repetir'] ?? '';

    // 2. COMPROBAR CAMPOS VACIOS
    if (
        $nombre === '' ||
        $email === '' ||
        $password === '' ||
        $repetir === ''
    ) {

        $mensaje = "Todos los campos son obligatorios";

        // 3. VALIDAR EMAIL
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $mensaje = "El correo electrónico no es válido";

        // 4. VALIDAR LONGITUD CONTRASEÑA
    } elseif (strlen($password) < 8) {

        $mensaje = "La contraseña debe tener al menos 8 caracteres";

        // 5. COMPROBAR CONTRASEÑAS
    } elseif ($password !== $repetir) {

        $mensaje = "Las contraseñas no coinciden";

        // 6. COMPROBAR EMAIL REPETIDO
    } elseif (existeEmail($conexion, $email)) {

        $mensaje = "Este correo ya está registrado";
    } else {

        // 7. CIFRAR CONTRASEÑA
        $passwordHash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        // 8. INSERTAR USUARIO
        if (insertarUsuario(
            $conexion,
            $nombre,
            $email,
            $passwordHash
        )) {

            // 9. REDIRIGIR
            header('Location: login.php');
            exit;
        } else {

            $mensaje = "No se ha podido completar el registro";
        }
    }
}

require_once 'includes/header.php';

?>

<h2>Crear una cuenta</h2>

<?php if ($mensaje): ?>
    <p class="error">
        <?= htmlspecialchars($mensaje) ?>
    </p>
<?php endif; ?>

<form action="registro.php" method="POST">

    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" maxlength="100" required>

    <label for="email">Correo electrónico</label>
    <input type="email" id="email" name="email"
        maxlength="150" required>

    <label for="password">Contraseña (mínimo 8 caracteres)</label>
    <input type="password" id="password" name="password"
        minlength="8" required>

    <label for="repetir">Repetir contraseña</label>
    <input type="password" id="repetir" name="repetir" required>

    <button type="submit">Registrarme</button>

</form>

<?php require_once 'includes/footer.php'; ?>