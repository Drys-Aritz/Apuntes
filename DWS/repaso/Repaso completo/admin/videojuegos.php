<?php
session_start();
$rutaBase = '../';
require_once '../includes/conexion.php';
require_once '../includes/funciones_bd.php';
require_once '../includes/funciones.php';
// TODO: comprobar que el usuario tiene rol admin antes de generar HTML.
// TODO: llamar a obtenerVideojuegos($conexion).
$videojuegos = [];
require_once '../includes/header.php';
?>
<h2>Administración del catálogo</h2>
<a class="boton" href="anadir.php">Añadir videojuego</a>
<table>
    <thead><tr><th>Nombre</th><th>Plataforma</th><th>Precio</th><th>Stock</th><th>Acciones</th></tr></thead>
    <tbody>
    <?php foreach ($videojuegos as $juego): ?>
        <tr>
            <td><?= htmlspecialchars($juego['nombre']) ?></td>
            <td><?= htmlspecialchars($juego['plataforma']) ?></td>
            <td><?= number_format($juego['precio'], 2, ',', '.') ?> €</td>
            <td><?= (int)$juego['stock'] ?></td>
            <td><a href="editar.php?id=<?= (int)$juego['id'] ?>">Editar</a> | <a href="eliminar.php?id=<?= (int)$juego['id'] ?>">Eliminar</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php require_once '../includes/footer.php'; ?>
