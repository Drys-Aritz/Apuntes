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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $accion = $_POST['accion'] ?? '';

    $id = filter_var(
        $_POST['id'] ?? 0,
        FILTER_VALIDATE_INT
    );

    if ($id === false || $id <= 0) {

        $mensaje = 'ID no válido.';
    } elseif ($accion === 'eliminar') {

        // Eliminar videojuego
        unset($_SESSION['carrito'][$id]);
    } elseif ($accion === 'anadir' || $accion === 'actualizar') {

        // Recoger cantidad
        $cantidad = filter_var(
            $_POST['cantidad'] ?? 0,
            FILTER_VALIDATE_INT
        );

        if ($cantidad === false || $cantidad <= 0) {

            $mensaje = 'Cantidad no válida.';
        } else {

            // Buscar videojuego en la base de datos
            $juego = obtenerVideojuego($conexion, $id);

            if ($juego === null) {

                $mensaje = 'El videojuego no existe.';
            } else {

                if ($accion === 'anadir') {

                    $nuevaCantidad =
                        ($_SESSION['carrito'][$id] ?? 0) + $cantidad;
                } else {

                    $nuevaCantidad = $cantidad;

                    if (!isset($_SESSION['carrito'][$id])) {
                        $mensaje = 'El videojuego no está en el carrito.';
                    }
                }

                if ($mensaje === '' && $nuevaCantidad > $juego['stock']) {

                    $mensaje = 'No hay suficiente stock.';
                } elseif ($mensaje === '') {

                    $_SESSION['carrito'][$id] = $nuevaCantidad;
                }
            }
        }
    } else {

        $mensaje = 'Acción no válida.';
    }
}

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