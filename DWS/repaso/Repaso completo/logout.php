<?php
session_start();
// TODO: eliminar los datos de sesión, invalidar la cookie de sesión
$_SESSION = [];
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}
// y destruir la sesión. No eliminar las cookies de preferencias.
session_destroy();
// TODO: redirigir a index.php y finalizar con exit.
header('Location: index.php');
exit;

require_once 'includes/header.php';
?>
<h2>Cerrar sesión</h2>
<p>Completa la lógica PHP para cerrar la sesión.</p>
<?php require_once 'includes/footer.php'; ?>
