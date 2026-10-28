
<?php

// TODO 1:
// Cargar el archivo includes/conexion.php
// para establecer la conexión con MySQL.


// TODO 2:
// Comprobar si el formulario se ha enviado mediante POST.


// TODO 3:
// Recuperar los siguientes datos del formulario:
// - nombre
// - genero
// - plataforma
// - precio
// - stock
//
// Eliminar los espacios innecesarios de los campos de texto.


// TODO 4:
// Validar los datos recibidos.
//
// Comprobar que:
// - El nombre no esté vacío.
// - El género no esté vacío.
// - La plataforma sea PC, PS5, Xbox o Switch.
// - El precio sea un número mayor que 0.
// - El stock sea un número entero mayor o igual que 0.


// TODO 5:
// Si todos los datos son válidos:
//
// - Preparar una consulta INSERT INTO para añadir
//   el videojuego a la tabla videojuegos.
//
// - Utilizar una sentencia preparada con mysqli.
//
// - Vincular los parámetros mediante bind_param().
//
// - Ejecutar la consulta.
//
// - Preparar un mensaje de confirmación.
//
// El campo id no debe incluirse en el INSERT,
// porque MySQL lo genera automáticamente.


// TODO 6:
// Si los datos no son válidos o la inserción falla,
// preparar un mensaje de error.

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Permite mostrar correctamente tildes y caracteres especiales. -->
    <meta charset="UTF-8">

    <!-- Título de la pestaña del navegador. -->
    <title>GameWorld - Añadir videojuego</title>

    <!-- Cargamos el archivo CSS del proyecto. -->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<div class="contenedor">

    <!-- Cabecera de la aplicación. -->
    <header>

        <h1>Añadir videojuego</h1>

        <!-- Menú de navegación. -->
        <nav>
            <a href="index.php">Inicio</a>
            <a href="catalogo.php">Catálogo</a>
            <a href="anadir.php">Añadir videojuego</a>
            <a href="stock.php">Gestionar stock</a>
        </nav>

    </header>

    <!-- Contenido principal. -->
    <main>

        <h2>Registrar un nuevo videojuego</h2>

        <p>
            Introduce los datos del videojuego
            que deseas añadir al catálogo.
        </p>

        <?php

        // TODO 7:
        // Mostrar el mensaje de confirmación o error.
        //
        // Utilizar:
        // class="mensaje" para las confirmaciones.
        // class="error" para los errores.

        ?>

        <!--
            Formulario para añadir un videojuego.

            action="anadir.php":
            Los datos se envían a este mismo archivo.

            method="POST":
            Los datos se envían en el cuerpo de la petición HTTP.
            PHP puede recuperarlos mediante $_POST.
        -->
        <form action="anadir.php" method="POST">

            <!--
                CAMPO NOMBRE

                type="text": campo de texto.
                id="nombre": identifica el campo en HTML.
                name="nombre": permite recuperar su valor
                mediante $_POST["nombre"].
                required: indica que es obligatorio.
                maxlength="100": limita la longitud.
            -->
            <label for="nombre">Nombre:</label>

            <input
                type="text"
                id="nombre"
                name="nombre"
                maxlength="100"
                required
            >

            <p></p>

            <!-- Campo para introducir el género. -->
            <label for="genero">Género:</label>

            <input
                type="text"
                id="genero"
                name="genero"
                maxlength="50"
                required
            >

            <p></p>

            <!--
                CAMPO PLATAFORMA

                select: crea una lista desplegable.
                name="plataforma": permite recuperar
                la opción mediante $_POST["plataforma"].

                El atributo value de cada option es
                el valor que recibirá PHP.
            -->
            <label for="plataforma">Plataforma:</label>

            <select id="plataforma" name="plataforma" required>

                <option value="">
                    Selecciona una plataforma
                </option>

                <option value="PC">PC</option>
                <option value="PS5">PS5</option>
                <option value="Xbox">Xbox</option>
                <option value="Switch">Switch</option>

            </select>

            <p></p>

            <!--
                CAMPO PRECIO

                type="number": permite introducir números.
                step="0.01": admite hasta dos decimales.
                min="0.01": establece el precio mínimo.
                required: campo obligatorio.

                PHP también deberá validar el precio.
            -->
            <label for="precio">Precio (€):</label>

            <input
                type="number"
                id="precio"
                name="precio"
                min="0.01"
                max="9999.99"
                step="0.01"
                required
            >

            <p></p>

            <!--
                CAMPO STOCK

                type="number": permite introducir números.
                min="0": no permite números negativos.
                step="1": establece incrementos enteros.
                required: campo obligatorio.

                PHP también deberá comprobar que
                el stock es un número entero válido.
            -->
            <label for="stock">Stock:</label>

            <input
                type="number"
                id="stock"
                name="stock"
                min="0"
                step="1"
                required
            >

            <p></p>

            <!--
                Botón para enviar todos los datos
                del formulario al archivo anadir.php.
            -->
            <button type="submit">
                Añadir videojuego
            </button>

            <!--
                type="reset": restablece los campos
                a sus valores iniciales.
                No modifica ningún dato en MySQL.
            -->
            <button type="reset">
                Limpiar formulario
            </button>

        </form>

        <!-- Enlace para volver al catálogo. -->
        <a class="boton" href="catalogo.php">
            Volver al catálogo
        </a>

    </main>

    <!-- Pie de página. -->
    <footer>
        <p>GameWorld - Añadir videojuego</p>
    </footer>

</div>

</body>
</html>
