<?php

// Cargamos los nombres de cookies y su duración.
require_once "includes/datos.php";

// TODO 1:
// Comprobar si se ha recibido $_POST["accion"].
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["accion"])) {
        switch ($_POST["accion"]) {
            case "guardar":
                // TODO 2:
                // Si la acción es "guardar":
                // - Recuperar el nombre y el tema.
                // - Eliminar espacios sobrantes del nombre.
                // - Validar que el nombre no esté vacío.
                // - Validar que el tema sea uno de los permitidos.
                // - Crear ambas cookies con duración de 7 días.
                // - Redirigir a preferencias.php.
                $nombre = trim($_POST["nombre"]);
                $tema = $_POST["tema"];
                if (!empty($nombre)) {
                    setcookie("nombre", $nombre, time() + (60 * 60 * 24 * 7));
                }
                if ($tema == "claro" || $tema == "oscuro") {
                    setcookie("tema", $tema, time() + (60 * 60 * 24 * 7));
                }
                header("Location: preferencias.php");
                exit;

            case "eliminarNombre":
                // TODO 3:
                // Si la acción es "eliminarNombre":
                // - Eliminar la cookie nombreUsuario.
                // - Redirigir a preferencias.php.
                $nombreUsuario = trim($_POST["nombreUsuario"]);
                setcookie($nombreUsuario, "nombreUsuario", time() - 3600);
                header("Location: preferencias.php");
                exit;

                // TODO 4:
                // Si la acción es "eliminarTema":
                // - Eliminar la cookie tema.
                // - Redirigir a preferencias.php.
                case "eliminarTema":
                $eliminarTema = trim($_POST["eliminarTema"]);
                setcookie($eliminarTema, "eliminarTema", time() - 3600);
                header("Location: preferencias.php");
                exit;
                // TODO 5:
                // Si la acción es "eliminarTodo":
                // - Eliminar las dos cookies.
                // - Redirigir a preferencias.php.

        }
    }
}
// TODO 6:
// Recuperar los valores actuales de las cookies
// para poder mostrarlos debajo del formulario.

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>GameWorld - Preferencias</title>

    <!-- Estilos generales. -->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <h1>Preferencias del usuario</h1>

    <!-- Menú de navegación. -->
    <nav>
        <a href="index.php">Inicio</a>
        <a href="preferencias.php">Preferencias</a>
        <a href="catalogo.php">Catálogo</a>
        <a href="carrito.php">Carrito</a>
        <a href="cerrar.php">Cerrar sesión</a>
    </nav>

    <!--
        Formulario para guardar las preferencias.

        action: archivo que recibe los datos.
        method="POST": método de envío del formulario.
    -->
    <form action="preferencias.php" method="POST">

        <!--
            Campo para introducir el nombre.
            El atributo name permite recuperarlo
            en PHP mediante $_POST["nombre"].
        -->
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">

        <!--
            Lista desplegable para seleccionar el tema.
            El valor llegará en $_POST["tema"].
        -->
        <label for="tema">Tema:</label>

        <select id="tema" name="tema">
            <option value="claro">Claro</option>
            <option value="oscuro">Oscuro</option>
        </select>

        <!--
            El botón envía accion="guardar".
            Esto permite identificar la operación
            que debe realizar PHP.
        -->
        <button type="submit"
            name="accion"
            value="guardar">
            Guardar preferencias
        </button>

    </form>

    <!--
        Formulario para eliminar preferencias.
        Cada botón envía una acción diferente.
    -->
    <form action="preferencias.php" method="POST">

        <button type="submit"
            name="accion"
            value="eliminarNombre">
            Eliminar nombre
        </button>

        <button type="submit"
            name="accion"
            value="eliminarTema">
            Eliminar tema
        </button>

        <button type="submit"
            name="accion"
            value="eliminarTodo">
            Eliminar todas las preferencias
        </button>

    </form>

    <h2>Preferencias actuales</h2>

    <?php

    // TODO 7:
    // Mostrar el nombre guardado.
    // Si no existe, indicar que no hay nombre guardado.
    //
    // Mostrar el tema actual.
    // Si no existe, indicar que se utiliza el tema claro.
    //
    // Utilizar htmlspecialchars() al mostrar el nombre.

    ?>

</body>

</html>