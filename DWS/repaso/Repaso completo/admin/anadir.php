<?php
session_start();
$rutaBase = '../';
require_once '../includes/conexion.php';
require_once '../includes/funciones_bd.php';
require_once '../includes/funciones.php';
$mensaje = '';
// TODO: comprobar rol admin antes de mostrar HTML.
// TODO: si llega POST, validar campos y comprobar nombre + plataforma duplicados.
// TODO: llamar a insertarVideojuego(...) y redirigir si se inserta correctamente.
require_once '../includes/header.php';
?>
<h2>Añadir videojuego</h2>
<?php if ($mensaje): ?><p class="error"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<form action="anadir.php" method="POST">
    <label for="nombre">Nombre</label><input id="nombre" name="nombre" maxlength="100" required>
    <label for="genero">Género</label><input id="genero" name="genero" maxlength="50" required>
    <label for="plataforma">Plataforma</label>
    <select id="plataforma" name="plataforma" required>
        <option value="">Selecciona una plataforma</option>
        <option value="PC">PC</option><option value="PS5">PS5</option>
        <option value="Xbox">Xbox</option><option value="Switch">Switch</option>
    </select>
    <label for="precio">Precio</label><input type="number" id="precio" name="precio" min="0.01" max="999999.99" step="0.01" required>
    <label for="stock">Stock</label><input type="number" id="stock" name="stock" min="0" step="1" required>
    <button type="submit">Guardar videojuego</button>
</form>
<?php require_once '../includes/footer.php'; ?>
