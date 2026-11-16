<?php
// Cargamos la conexión (y arranca la sesión)
require_once __DIR__ . '/connection.php';
/** @var mysqli $conn La conexión se crea en connection.php. */
// Cargamos las funciones
require_once __DIR__ . '/functions.php';
// Variable para guardar el mensaje de error (vacía al principio)
$error = "";
// Si se ha enviado el formulario (método POST)...
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos el usuario escrito (si no existe, cadena vacía)
    $username = $_POST['username'] ?? '';
    // Recogemos la contraseña escrita
    $password = $_POST['password'] ?? '';
    // Consulta para buscar al usuario por su nombre de usuario
    $sql = "SELECT * FROM users WHERE username = ?";
    // Preparamos la consulta
    $stmt = mysqli_prepare($conn, $sql);
    // Ponemos el usuario en el ?
    mysqli_stmt_bind_param($stmt, "s", $username);
    // Ejecutamos la consulta
    mysqli_stmt_execute($stmt);
    // Obtenemos el resultado
    $result = mysqli_stmt_get_result($stmt);
    // Cogemos la fila del usuario (o null si no existe)
    $user = mysqli_fetch_assoc($result);
    // Si el usuario existe y la contraseña coincide con el hash guardado...
    if ($user && password_verify($password, $user['password'])) {
        // Guardamos el nombre del usuario en la sesión (así sabemos que es admin)
        $_SESSION['admin_name'] = $user['name'];
        // Redirigimos a la página de inicio
        header("Location: index.php");
        // Paramos el script tras redirigir
        exit;
    // Si los datos no son correctos...
    } else {
        // Guardamos el mensaje de error
        $error = "Datu okerrak. Ez daukazu baimenik.";
    }
}
// Título de la pestaña
$pageTitle = "Saioa hasi";
// Cargamos la cabecera con el menú
include __DIR__ . '/includes/header.php';
?>
<!-- Contenido principal -->
<main>
    <!-- Título de la página -->
    <h2>Saioa hasi</h2>
    <!-- Caja del formulario -->
    <div class="box">
        <?php
        // Si hay mensaje de error, lo mostramos
        if ($error != "") {
            // Mostramos el error en una caja roja
            echo '<div class="error">' . $error . '</div>';
        }
        ?>
        <!-- Formulario que envía los datos por POST a esta misma página -->
        <form class="login" method="post" action="sessiontart.php">
            <!-- Etiqueta del usuario -->
            <label for="username">Erabiltzailea</label>
            <!-- Campo de texto del usuario -->
            <input type="text" id="username" name="username" required>
            <!-- Etiqueta de la contraseña -->
            <label for="password">Pasahitza</label>
            <!-- Campo de contraseña (no se ve lo que se escribe) -->
            <input type="password" id="password" name="password" required>
            <!-- Botón de enviar -->
            <button type="submit">Sartu</button>
        <!-- Fin del formulario -->
        </form>
    <!-- Fin de la caja -->
    </div>
<!-- Fin del contenido principal -->
</main>
<?php
// Cargamos el pie de página
include __DIR__ . '/includes/footer.php';
?>
