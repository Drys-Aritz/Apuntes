
<?php

// TODO 1:
// Cargar la conexión con la base de datos.


// TODO 2:
// Consultar todos los videojuegos para mostrar
// sus nombres en la lista desplegable.


// TODO 3:
// Comprobar si se ha enviado el formulario por POST.


// TODO 4:
// Recuperar:
// - id del videojuego
// - nuevo stock
//
// Validar que:
// - El ID corresponde a un videojuego existente.
// - El stock es un número entero mayor o igual a 0.


// TODO 5:
// Si los datos son válidos:
// - Preparar una consulta UPDATE.
// - Vincular los parámetros.
// - Ejecutar la consulta.
// - Preparar un mensaje de confirmación.
//
// Si los datos no son válidos:
// - Preparar un mensaje de error.

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>GameWorld - Gestionar stock</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<div class="contenedor">

    <header>
        <h1>Gestión de stock</h1>

        <nav>
            <a href="index.php">Inicio</a>
            <a href="catalogo.php">Catálogo</a>
            <a href="stock.php">Gestionar stock</a>
        </nav>
    </header>

    <main>

        <h2>Modificar stock de un videojuego</h2>

        <?php

        // TODO 6:
        // Mostrar el mensaje de confirmación o error,
        // si existe.

        ?>

        <!--
            Formulario para modificar el stock.

            POST envía los datos en el cuerpo
            de la petición HTTP.
        -->
        <form action="stock.php" method="POST">

            <label for="id">Videojuego:</label>

            <!--
                La lista se completará con los videojuegos
                recuperados desde MySQL.
            -->
            <select id="id" name="id" required>

                <option value="">
                    Selecciona un videojuego
                </option>

                <?php

                // TODO 7:
                // Recorrer los videojuegos obtenidos
                // de la base de datos.
                //
                // Crear una etiqueta <option> por cada uno.
                //
                // value: ID del videojuego.
                // texto visible: nombre del videojuego.

                ?>

            </select>

            <!--
                Campo numérico para introducir el nuevo stock.

                type="number": permite introducir números.
                min="0": establece un mínimo de cero
                en la validación del navegador.
                step="1": indica incrementos de una unidad.
                required: campo obligatorio.

                PHP también debe validar este valor,
                porque la validación HTML puede omitirse.
            -->
            <label for="stock">Nuevo stock:</label>

            <input
                type="number"
                id="stock"
                name="stock"
                min="0"
                step="1"
                required
            >

            <!-- Botón para enviar el formulario. -->
            <button type="submit">
                Actualizar stock
            </button>

        </form>

        <p>
            Introduce la cantidad total de unidades
            que debe tener el videojuego.
        </p>

    </main>

    <footer>
        <p>GameWorld - Gestión de stock</p>
    </footer>

</div>

</body>
</html>
