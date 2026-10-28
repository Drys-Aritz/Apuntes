
<?php

// TODO 1:
// Cargar la conexión con la base de datos.


// TODO 2:
// Recuperar el parámetro "id" enviado por GET.


// TODO 3:
// Comprobar que el ID es un entero positivo.


// TODO 4:
// Si el ID es válido:
// - Preparar una consulta SELECT con WHERE id = ?
// - Vincular el parámetro.
// - Ejecutar la consulta.
// - Recuperar el videojuego.
//
// Si no existe, preparar un mensaje de error.

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>GameWorld - Detalles</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<div class="contenedor">

    <header>
        <h1>Detalles del videojuego</h1>

        <nav>
            <a href="index.php">Inicio</a>
            <a href="catalogo.php">Catálogo</a>
            <a href="stock.php">Gestionar stock</a>
        </nav>
    </header>

    <main>

        <?php

        // TODO 5:
        // Si el videojuego existe, mostrar sus datos
        // utilizando la estructura HTML indicada.
        //
        // <div class="detalle">
        //     <h2>Nombre del videojuego</h2>
        //     <p>Género: ...</p>
        //     <p>Plataforma: ...</p>
        //     <p>Precio: ... €</p>
        //     <p>Stock: ...</p>
        // </div>
        //
        // Si no existe, mostrar el mensaje de error
        // dentro de un elemento con class="error".
        //
        // Utilizar htmlspecialchars() para los textos.

        ?>

        <!-- Enlace para volver al catálogo. -->
        <a class="boton" href="catalogo.php">
            Volver al catálogo
        </a>

    </main>

    <footer>
        <p>GameWorld - Detalles</p>
    </footer>

</div>

</body>
</html>
