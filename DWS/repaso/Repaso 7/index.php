
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Permite mostrar correctamente tildes y otros caracteres. -->
    <meta charset="UTF-8">

    <!-- Título de la pestaña del navegador. -->
    <title>GameWorld - Inicio</title>

    <!-- Cargamos los estilos desde la carpeta css. -->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<div class="contenedor">

    <header>
        <h1>GameWorld</h1>

        <!-- Menú para navegar entre las páginas. -->
        <nav>
            <a href="index.php">Inicio</a>
            <a href="catalogo.php">Catálogo</a>
            <a href="stock.php">Gestionar stock</a>
        </nav>
    </header>

    <main>
        <h2>Bienvenido a GameWorld</h2>

        <p>
            Consulta nuestro catálogo de videojuegos,
            busca tus títulos favoritos y comprueba
            su disponibilidad.
        </p>

        <!-- Enlace directo al catálogo. -->
        <a class="boton" href="catalogo.php">
            Ver catálogo
        </a>
    </main>

    <footer>
        <p>GameWorld - Ejercicio PHP y MySQL</p>
    </footer>

</div>

</body>
</html>
