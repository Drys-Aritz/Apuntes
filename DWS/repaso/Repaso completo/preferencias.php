<?php
session_start();
require_once 'includes/funciones.php';
$mensaje = '';
// TODO: si llega POST, validar tema = claro u oscuro.
// TODO: guardar cookie durante 7 días con setcookie() antes de generar HTML.
// TODO: redirigir a preferencias.php después de guardar.
require_once 'includes/header.php';
?>
<h2>Preferencias de visualización</h2>
<?php if ($mensaje): ?><p class="mensaje"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<form action="preferencias.php" method="POST">
    <label for="tema">Tema</label>
    <select id="tema" name="tema">
        <option value="claro">Claro</option>
        <option value="oscuro">Oscuro</option>
    </select>
    <button type="submit">Guardar preferencias</button>
</form>
<?php require_once 'includes/footer.php'; ?>
