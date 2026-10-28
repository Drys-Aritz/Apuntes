
<?php

// Cargamos los datos de videojuegos.
require_once "includes/datos.php";

// TODO 1:
// Iniciar o recuperar la sesión.


// TODO 2:
// Si no existe $_SESSION["carrito"],
// crear un array vacío.


// TODO 3:
// Comprobar si se ha recibido una acción mediante POST.
// Las acciones posibles son:
// "aumentar", "reducir", "eliminar" y "vaciar".


// TODO 4:
// Si la acción es "vaciar":
// dejar el carrito vacío.


// TODO 5:
// Para las demás acciones:
// - Recuperar el ID.
// - Comprobar que el videojuego existe.
// - Comprobar que está añadido al carrito.
//
// aumentar:
// Sumar una unidad sin superar el stock.
//
// reducir:
// Restar una unidad.
// Si llega a cero, eliminar el videojuego.
//
// eliminar:
// Eliminar el videojuego directamente.


// TODO 6:
// Crear las variables necesarias para calcular:
// - Cantidad total de unidades.
// - Importe total del carrito.

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>GameWorld - Carrito</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <h1>Carrito de compra</h1>

    <!-- Menú de navegación. -->
    <nav>
        <a href="index.php">Inicio</a>
        <a href="preferencias.php">Preferencias</a>
        <a href="catalogo.php">Catálogo</a>
        <a href="carrito.php">Carrito</a>
        <a href="cerrar.php">Cerrar sesión</a>
    </nav>

    <?php

    // TODO 7:
    // Comprobar si el carrito está vacío.
    //
    // Si está vacío, mostrar:
    // "El carrito está vacío".
    //
    // Si tiene productos, mostrar la tabla
    // y los totales correspondientes.

    ?>

    <!-- Tabla de videojuegos del carrito. -->
    <table>

        <!-- Cabecera proporcionada. -->
        <thead>
            <tr>
                <th>Videojuego</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <!-- Filas que debe generar el alumnado. -->
        <tbody>

            <?php

            // TODO 8:
            // Recorrer $_SESSION["carrito"] con foreach.
            //
            // Por cada videojuego:
            // - Recuperar nombre y precio del catálogo.
            // - Mostrar la cantidad.
            // - Calcular subtotal = precio * cantidad.
            // - Acumular unidades e importe total.
            // - Generar una fila de la tabla.
            //
            // En la última celda, crear un formulario
            // POST que envíe:
            // - id: identificador del videojuego.
            // - accion: aumentar, reducir o eliminar.
            //
            // Puedes utilizar tres botones dentro
            // del mismo formulario.

            ?>

        </tbody>

    </table>

    <?php

    // TODO 9:
    // Mostrar el número total de unidades.
    // Mostrar el importe total con dos decimales.

    ?>

    <!--
        Formulario para vaciar el carrito completo.

        No necesita enviar un ID porque la operación
        afecta a todos los videojuegos añadidos.

        El botón envía accion="vaciar".
    -->
    <form action="carrito.php" method="POST">

        <button type="submit"
                name="accion"
                value="vaciar">
            Vaciar carrito
        </button>

    </form>

</body>
</html>
