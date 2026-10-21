<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= escapar($tituloPagina) ?> | Tx_Series</title>
    <link rel="stylesheet" href="css/css/styles.css">
</head>
<body>
    <header>
        <div class="goiburua">
            <a href="index.php" aria-label="Tx_Series, inicio">
                <img src="img/img/logo.png" alt="Tx_Series">
            </a>
            <nav aria-label="Navegación principal">
                <a href="index.php">Inicio</a>
                <a href="buscar.php">Buscar</a>
                <a href="anadir.php">Añadir serie</a>
                <a href="estadisticas.php">Estadísticas</a>
            </nav>
        </div>
    </header>
    <main>
        <h1><?= escapar($tituloPagina) ?></h1>