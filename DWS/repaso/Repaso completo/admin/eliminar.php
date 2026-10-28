<?php
session_start();
$rutaBase = '../';
require_once '../includes/conexion.php';
require_once '../includes/funciones_bd.php';
require_once '../includes/funciones.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
// TODO: comprobar rol admin y validar el ID.
// TODO: obtener el videojuego mediante una función de BD.
// TODO: si llega POST, validar de nuevo el ID y ejecutar eliminarVideojuego(...).
// TODO: tratar el caso de videojuegos presentes en pedidos: no borrar su historial.
// TODO: redirigir tras eliminar correctamente.
$juego = null;
require_once '../includes/header.php';
?>
<h2>Eliminar videojuego</h2>
<?php if ($juego): ?>
    <p>¿Seguro que quieres eliminar <strong><?= htmlspecialchars($juego['nombre']) ?></strong>?</p>
    <form action="eliminar.php?id=<?= (int)$juego['id'] ?>" method="POST">
        <button type="submit">Confirmar eliminación</button>
        <a class="boton" href="videojuegos.php">Cancelar</a>
    </form>
<?php else: ?><p class="error">Videojuego no encontrado.</p><?php endif; ?>
<?php require_once '../includes/footer.php'; ?>
