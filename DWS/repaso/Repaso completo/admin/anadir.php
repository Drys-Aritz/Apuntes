<?php
session_start();
$rutaBase = '../';
require_once '../includes/conexion.php';
require_once '../includes/funciones_bd.php';
require_once '../includes/funciones.php';
$mensaje = '';
// TODO: comprobar rol admin antes de mostrar HTML.
if (!esAdmin()) {
    header('Location: ../login.php');
    exit;
}

// TODO: si llega POST, validar campos y comprobar nombre + plataforma duplicados.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim($_POST['nombre'] ?? '');
    $genero = trim($_POST['genero'] ?? '');
    $plataforma = trim($_POST['plataforma'] ?? '');

    $precio = filter_var(
        $_POST['precio'] ?? '',
        FILTER_VALIDATE_FLOAT
    );

    $stock = filter_var(
        $_POST['stock'] ?? '',
        FILTER_VALIDATE_INT
    );



    // TODO: llamar a insertarVideojuego(...) y redirigir si se inserta correctamente.
    $plataformasPermitidas = ['PC', 'PS5', 'Xbox', 'Switch'];

    if ($nombre === '' || $genero === '' || $plataforma === '') {

        $mensaje = 'Debes rellenar todos los campos.';
    } elseif (!in_array($plataforma, $plataformasPermitidas, true)) {

        $mensaje = 'La plataforma no es válida.';
    } elseif ($precio === false || $precio <= 0) {

        $mensaje = 'El precio debe ser mayor que cero.';
    } elseif ($stock === false || $stock < 0) {

        $mensaje = 'El stock debe ser un número entero igual o mayor que cero.';
    } elseif (strlen($nombre) > 100 || strlen($genero) > 50) {

        $mensaje = 'El nombre o el género son demasiado largos.';
    }
    if ($mensaje === '') {

        if (existeVideojuego($conexion, $nombre, $plataforma)) {

            $mensaje = 'Ya existe un videojuego con ese nombre y plataforma.';
        }
    }
    if ($mensaje === '') {

        $insertado = insertarVideojuego(
            $conexion,
            $nombre,
            $genero,
            $plataforma,
            $precio,
            $stock
        );

        if ($insertado) {

            header('Location: index.php');
            exit;
        } else {

            $mensaje = 'Error al guardar el videojuego.';
        }
    }
}
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
        <option value="PC">PC</option>
        <option value="PS5">PS5</option>
        <option value="Xbox">Xbox</option>
        <option value="Switch">Switch</option>
    </select>
    <label for="precio">Precio</label><input type="number" id="precio" name="precio" min="0.01" max="999999.99" step="0.01" required>
    <label for="stock">Stock</label><input type="number" id="stock" name="stock" min="0" step="1" required>
    <button type="submit">Guardar videojuego</button>
</form>
<?php require_once '../includes/footer.php'; ?>