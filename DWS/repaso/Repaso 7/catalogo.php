
<?php

// TODO 1:
// Cargar el archivo includes/conexion.php
// para disponer de la conexión con MySQL.


// TODO 2:
// Recuperar los valores enviados por GET:
// - plataforma
// - busqueda
//
// Si no se reciben, utilizar cadenas vacías.


// TODO 3:
// Preparar una consulta que recupere los videojuegos.
//
// La consulta debe permitir:
// - Mostrar todos los videojuegos.
// - Filtrar por plataforma.
// - Buscar por parte del nombre.
// - Combinar ambos filtros.
//
// Utilizar sentencias preparadas para los filtros.


// TODO 4:
// Ejecutar la consulta y obtener los resultados.

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>GameWorld - Catálogo</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<div class="contenedor">

    <header>
        <h1>Catálogo de videojuegos</h1>

        <nav>
            <a href="index.php">Inicio</a>
            <a href="catalogo.php">Catálogo</a>
            <a href="stock.php">Gestionar stock</a>
        </nav>
    </header>

    <main>

        <h2>Buscar videojuegos</h2>

        <!--
            Formulario de búsqueda y filtrado.

            method="GET" envía los datos en la URL.
            action="catalogo.php" indica qué archivo
            recibe y procesa los datos.
        -->
        <form action="catalogo.php" method="GET">

            <!--
                El atributo name="busqueda" permite
                recuperar el texto mediante
                $_GET["busqueda"].
            -->
            <label for="busqueda">Nombre:</label>

            <input
                type="text"
                id="busqueda"
                name="busqueda"
                placeholder="Buscar videojuego"
            >

            <!--
                El select permite elegir una plataforma.

                Cada option tiene un value que se enviará
                a PHP mediante $_GET["plataforma"].

                La opción vacía significa todas.
            -->
            <label for="plataforma">Plataforma:</label>

            <select id="plataforma" name="plataforma">
                <option value="">Todas</option>
                <option value="PC">PC</option>
                <option value="PS5">PS5</option>
                <option value="Xbox">Xbox</option>
                <option value="Switch">Switch</option>
            </select>

            <!-- Envía ambos campos del formulario. -->
            <button type="submit">Buscar</button>

            <!-- Permite quitar los filtros. -->
            <a class="boton" href="catalogo.php">
                Limpiar
            </a>

        </form>

        <h2>Videojuegos disponibles</h2>

        <!-- Tabla donde se mostrarán los resultados SQL. -->
        <table>

            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Género</th>
                    <th>Plataforma</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Detalles</th>
                </tr>
            </thead>

            <tbody>

                <?php

                // TODO 5:
                // Recorrer los resultados de la consulta.
                //
                // Generar una fila <tr> por videojuego.
                //
                // Mostrar:
                // - Nombre
                // - Género
                // - Plataforma
                // - Precio con dos decimales
                // - Stock o "Agotado"
                //
                // En la última celda, generar un enlace:
                //
                // detalle.php?id=IDENTIFICADOR
                //
                // Sustituir IDENTIFICADOR por el ID real
                // del videojuego.
                //
                // Utilizar htmlspecialchars() al mostrar
                // los textos recuperados de la base de datos.

                ?>

            </tbody>

        </table>

        <?php

        // TODO 6:
        // Si la consulta no devuelve registros,
        // mostrar un mensaje indicando que no se
        // han encontrado videojuegos.

        ?>

    </main>

    <footer>
        <p>GameWorld - Catálogo</p>
    </footer>

</div>

</body>
</html>
