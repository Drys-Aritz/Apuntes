
<?php

// Cargamos el array de videojuegos y la configuración.
require_once "includes/datos.php";

// TODO 1:
// Iniciar o recuperar la sesión.


// TODO 2:
// Si no existe $_SESSION["carrito"],
// crear un array vacío.


// TODO 3:
// Comprobar si se ha recibido la acción "anadir"
// mediante el formulario POST.


// TODO 4:
// Recuperar el ID enviado.
// Comprobar que existe en $videojuegos.
// Comprobar que tiene stock.


// TODO 5:
// Añadir una unidad al carrito.
// Si ya existe, aumentar su cantidad.
// No permitir superar el stock disponible.

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>GameWorld - Catálogo</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <h1>Catálogo de videojuegos</h1>

    <!-- Navegación entre las páginas. -->
    <nav>
        <a href="index.php">Inicio</a>
        <a href="preferencias.php">Preferencias</a>
        <a href="catalogo.php">Catálogo</a>
        <a href="carrito.php">Carrito</a>
        <a href="cerrar.php">Cerrar sesión</a>
    </nav>

    <!-- Tabla del catálogo. -->
    <table>

        <!-- Cabecera de la tabla. -->
        <thead>
            <tr>
                <th>Videojuego</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acción</th>
            </tr>
        </thead>

        <!-- Filas que deben generarse con PHP. -->
        <tbody>

            <?php

            // TODO 6:
            // Recorrer $videojuegos mediante foreach.
            //
            // Por cada videojuego, generar una fila <tr>
            // con las siguientes celdas <td>:
            //
            // 1. Nombre del videojuego.
            // 2. Precio con dos decimales.
            // 3. Stock disponible.
            // 4. Formulario para añadir una unidad.
            //
            // El formulario debe enviar mediante POST:
            // - id: identificador del videojuego.
            // - accion: valor "anadir".
            //
            // Utilizar un input oculto para enviar el ID.
            //
            // Si el stock es 0, mostrar "Agotado"
            // en lugar del formulario.

            ?>

        </tbody>

    </table>

</body>
</html>
