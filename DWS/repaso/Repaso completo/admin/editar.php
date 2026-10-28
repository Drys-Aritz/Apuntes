<?php
session_start();
$rutaBase = '../';
require_once '../includes/conexion.php';
require_once '../includes/funciones_bd.php';
require_once '../includes/funciones.php';
$mensaje = '';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
// TODO: comprobar rol admin y validar el ID.
// TODO: recuperar el videojuego con obtenerVideojuegoPorId(...).
// TODO: si llega POST, validar los campos y llamar a actualizarVideojuego(...).
// TODO: redirigir al listado después de actualizar.
$juego = null;
require_once '../includes/header.php';
?>
<h2>Editar videojuego</h2>
<?php if ($mensaje): ?><p class="error"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<?php if ($juego): ?>
<form action="editar.php?id=<?= (int)$juego['id'] ?>" method="POST">
    <label for="nombre">Nombre</label><input id="nombre" name="nombre" maxlength="100" value="<?= htmlspecialchars($juego['nombre']) ?>" required>
    <label for="genero">Género</label><input id="genero" name="genero" maxlength="50" value="<?= htmlspecialchars($juego['genero']) ?>" required>
    <label for="plataforma">Plataforma</label>
    <select id="plataforma" name="plataforma" required>
        <?php foreach (['PC','PS5','Xbox','Switch'] as $plataforma): ?>
            <option value="<?= $plataforma ?>" <?= $juego['plataforma'] === $plataforma ? 'selected' : '' ?>><?= $plataforma ?></option>
        <?php endforeach; ?>
    </select>
    <label for="precio">Precio</label><input type="number" id="precio" name="precio" min="0.01" max="999999.99" step="0.01" value="<?= htmlspecialchars((string)$juego['precio']) ?>" required>
    <label for="stock">Stock</label><input type="number" id="stock" name="stock" min="0" step="1" value="<?= (int)$juego['stock'] ?>" required>
    <button type="submit">Guardar cambios</button>
</form>
<?php else: ?><p class="error">Videojuego no encontrado.</p><?php endif; ?>
<?php require_once '../includes/footer.php'; ?>
