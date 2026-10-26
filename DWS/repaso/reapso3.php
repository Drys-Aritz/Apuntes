<?php
// Array multidimensional con los videojuegos de la tienda.
// Cada videojuego incluye la edad del usuario que quiere comprarlo.
$videojuegos = [
    [
        "titulo" => "Minecraft",
        "genero" => "Aventura",
        "plataforma" => "PC",
        "precio" => 29.99,
        "stock" => 8,
        "edadMinima" => 7,
        "edadUsuario" => 15
    ],
    [
        "titulo" => "EA Sports FC 25",
        "genero" => "Deportes",
        "plataforma" => "PS5",
        "precio" => 49.99,
        "stock" => 0,
        "edadMinima" => 3,
        "edadUsuario" => 16
    ],
    [
        "titulo" => "The Legend of Zelda",
        "genero" => "Aventura",
        "plataforma" => "Switch",
        "precio" => 59.99,
        "stock" => 5,
        "edadMinima" => 12,
        "edadUsuario" => 10
    ],
    [
        "titulo" => "Mario Kart 8",
        "genero" => "Carreras",
        "plataforma" => "Switch",
        "precio" => 39.99,
        "stock" => 12,
        "edadMinima" => 3,
        "edadUsuario" => 8
    ],
    [
        "titulo" => "God of War",
        "genero" => "Acción",
        "plataforma" => "PS5",
        "precio" => 44.99,
        "stock" => 0,
        "edadMinima" => 18,
        "edadUsuario" => 20
    ]
];

foreach ($videojuegos as $videojuego) {
    if ($videojuego["stock"] > 0) {
        echo $videojuego["titulo"] . ": Unidasdes restantes " . $videojuego["stock"];
        echo "<br>";
    } else {
        echo $videojuego["titulo"] . ": Agotado";
        echo "<br>";
    }
}
echo "<br>";

foreach ($videojuegos as $videojuego) {
    if ($videojuego["precio"] < 20) {
        echo $videojuego["titulo"] . ", Economico";
        echo "<br>";
    } else if ($videojuego["precio"] >= 20 || $videojuego["precio"] <= 50) {
        echo $videojuego["titulo"] . ", Precio medio";
        echo "<br>";
    } else if ($videojuego["precio"] > 50) {
        echo $videojuego["titulo"] . ", Caro";
        echo "<br>";
    }
}
echo "<br>";

foreach ($videojuegos as $videojuego) {
    if ($videojuego["edadUsuario"] >= $videojuego["edadMinima"]) {
        echo "Usuario puede jugar " . $videojuego["titulo"];
        echo "<br>";
    } else {
        echo "Usuario no puede jugar " . $videojuego["titulo"];
        echo "<br>";
    }
}
echo "<br>";

foreach ($videojuegos as $videojuego) {
    if (($videojuego["stock"] > 0) && ($videojuego["edadUsuario"] >= $videojuego["edadMinima"])) {
        echo "Usuario puede comprar " . $videojuego["titulo"];
        echo "<br>";
    } else {
        if ($videojuego["stock"] == 0) {
            echo "Usuario no puede comprar " . $videojuego["titulo"] . ", esta agotado";
            echo "<br>";
        } else if ($videojuego["edadUsuario"] < $videojuego["edadMinima"]) {
            echo "Usuario no puede comprar " . $videojuego["titulo"] . ", no cumple con la edad minima";
            echo "<br>";
        }
    }
}
echo "<br>";
echo "<br>";

//2. switch
foreach ($videojuegos as $videojuego) {
    switch ($videojuego) {
        case 1:
    }
}
echo "<br>";
echo "<br>";
