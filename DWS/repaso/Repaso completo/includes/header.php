<?php
// Este archivo se incluye después de procesar formularios y redirecciones.
// TODO: recuperar el tema guardado en la cookie y validar su valor.
$tema = 'claro';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameWorld</title>
    <link rel="stylesheet" href="<?= $rutaBase ?? '' ?>css/estilos.css">
</head>
<body class="<?= htmlspecialchars($tema) ?>">
<div class="contenedor">
<header>
    <h1>GameWorld</h1>
    <nav>
        <a href="<?= $rutaBase ?? '' ?>index.php">Inicio</a>
        <a href="<?= $rutaBase ?? '' ?>catalogo.php">Catálogo</a>
        <a href="<?= $rutaBase ?? '' ?>carrito.php">Carrito</a>
        <a href="<?= $rutaBase ?? '' ?>mis_pedidos.php">Mis pedidos</a>
        <a href="<?= $rutaBase ?? '' ?>preferencias.php">Preferencias</a>
        <!-- TODO: mostrar Registro / Entrar o Salir según la sesión. -->
        <a href="<?= $rutaBase ?? '' ?>registro.php">Registro</a>
        <a href="<?= $rutaBase ?? '' ?>login.php">Entrar</a>
        <a href="<?= $rutaBase ?? '' ?>logout.php">Salir</a>
        <!-- TODO: mostrar Administración solo para usuarios administradores. -->
        <a href="<?= $rutaBase ?? '' ?>admin/videojuegos.php">Administración</a>
    </nav>
</header>
<main>
