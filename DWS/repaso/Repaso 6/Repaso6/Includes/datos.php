<?php

// Array asociativo con los videojuegos de GameWorld.
// La clave exterior es el ID de cada videojuego.
// Cada videojuego tiene nombre, precio y stock.
$videojuegos = [
    1 => [
        "nombre" => "Minecraft",
        "precio" => 29.99,
        "stock" => 8
    ],
    2 => [
        "nombre" => "EA Sports FC 25",
        "precio" => 49.99,
        "stock" => 0
    ],
    3 => [
        "nombre" => "The Legend of Zelda",
        "precio" => 59.99,
        "stock" => 5
    ],
    4 => [
        "nombre" => "Mario Kart 8",
        "precio" => 39.99,
        "stock" => 12
    ],
    5 => [
        "nombre" => "God of War",
        "precio" => 44.99,
        "stock" => 0
    ]
];

// Valores permitidos para el tema visual.
$temas = ["claro", "oscuro"];

// Nombres de las cookies.
$cookieNombre = "nombreUsuario";
$cookieTema = "tema";

// Duración de las cookies: 7 días en segundos.
$duracionCookies = 7 * 24 * 60 * 60;

// Nombre de la variable de sesión del carrito.
$nombreCarrito = "carrito";

?>
