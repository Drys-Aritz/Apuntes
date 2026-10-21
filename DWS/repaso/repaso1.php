<?php
// ==========================================================
// 1º Declaracion de variables y Mostrar valor y tipo
// ==========================================================

$titulo = "Minecraft"; 
//El texto va entre comillas.

$precio = 29.99;      
//Los números decimales se escriben con punto, no con coma.

$unidades = 15;   
//Los números enteros se escriben sin comillas.

$disponible = true; 
//Los valores verdadero y falso tienen palabras específicas en PHP

$descuento = 20;

$fechaSalida = null;
//null representa la ausencia de valor.


echo "·".$titulo;
echo " | ";
echo gettype ($titulo);
echo " | ";
var_dump($titulo);

echo "<br>";

echo "·".$precio;
echo " | ";
echo gettype ($precio);
echo " | ";
var_dump($precio);

echo "<br>";

echo "·".$unidades;
echo " | ";
echo gettype ($unidades);
echo " | ";
var_dump($unidades);

echo "<br>";

echo "·".$disponible;
echo " | ";
echo gettype ($disponible);
echo " | ";
var_dump($disponible);

echo "<br>";

echo "·".$descuento;
echo " | ";
echo gettype ($descuento);
echo " | ";
var_dump($descuento);

echo "<br>";

echo "·".$fechaSalida;
echo " | ";
echo gettype ($fechaSalida);
echo " | ";
var_dump($fechaSalida);

echo "<br>";
echo "<br>";

// ==========================================================
// 2º Operadores aritméticos
// ==========================================================

//Precio total de todas las unidades disponibles.
$precioTotal = $unidades * $precio;
echo $precioTotal."€<br>";
//Precio del videojuego después de aplicar el descuento.
$precioDescuento = $descuento / 100 * $precio;
$precioDescuento = $precio - $precioDescuento;
echo $precioDescuento."€<br>";
//Precio de cinco unidades con el descuento aplicado.
$unidadesDescuento = 5 * $precioDescuento;
echo $unidadesDescuento."€<br>";
//Unidades restantes después de vender cuatro videojuegos.
$unidades = 15;
$unidadesRestantes = $unidades - 4;
echo $unidadesRestantes."<br>";

echo "<br>";

// ==========================================================
// 3º Operadores de comparación y lógicos
// ==========================================================

//Si el videojuego cuesta más de 30 €.
if ($precio <= 30) {
    echo "El videojuego cuesta más de 30 €";
} else {
    echo "El videojuego cuesta 30 € o menos";
}
echo "<br>";

//Si quedan al menos 10 unidades.
if ($unidades >= 10) {
    echo "Quedan al menos 10 unidades";
} else {
    echo "Quedan mas de 10 unidades";
}
echo "<br>";

//Si el videojuego está disponible y tiene unidades en stock.
if (($disponible == true) && ($unidades > 0)) {
    echo "El videojuego está disponible y tiene unidades en stock";
} else {
    echo "El videojuego no está disponible o no tiene unidades en stock";
}
echo "<br>";

//Si el descuento es mayor que 0 y menor o igual que 50.
if (($descuento > 0) && ($descuento <= 50)) {
    echo "El descuento es mayor que 0 y menor o igual que 50";
} else {
    echo "El descuento no es mayor que 0 y no es menor o igual que 50";
}
echo "<br>";

var_dump(15 == "15");
var_dump(15 === "15");

echo "<br>";
echo "<br>";

// ==========================================================
// 4º Cadenas de texto
// ==========================================================

//Crea una frase utilizando concatenación con el operador ..
$frase = "Mi videojuego favorito es " . $titulo;
echo $frase;
echo "<br>";

//Muestra el título del videojuego en mayúsculas y minúsculas.
$tituloMayus = strtoupper($titulo);
$tituloMinus = strtolower($titulo);

echo $tituloMayus."<br>";
echo $tituloMinus."<br>";

//Calcula el número de caracteres del título.
$numeroCaracter = strlen($titulo);

echo $numeroCaracter;
echo "<br>";

//Muestra una frase utilizando comillas dobles e interpolación de variables.
$frase = "El videojuego se llama $titulo";
echo $frase;
echo "<br>";

//Comprueba qué ocurre al utilizar comillas simples.
$fraseComillasSimples = 'El videojuego se llama $titulo';
echo $fraseComillasSimples;

echo "<br>";
echo "<br>";

// ==========================================================
// 5º Modificación y conversión de variables
// ==========================================================

//Modifica el precio inicial del videojuego.
$precio = 12.99;
echo $precio;
echo "<br>";

//Incrementa en cinco las unidades disponibles.
$unidades = $unidades + 5;
echo $unidades;
echo "<br>";

//Convierte la cadena "25" a un número entero.
$numeroTexto = "25";
var_dump($numeroTexto);
$numeroTexto = (int) $numeroTexto;
var_dump($numeroTexto);
echo "<br>";

//Convierte la cadena "19.95" a un número decimal.
$numeroDecimal = "19.95";
var_dump($numeroDecimal);
$numeroDecimal = (float) $numeroDecimal;
var_dump($numeroDecimal);
echo "<br>";

echo "<br>";

// ==========================================================
// 6º Presentación de resultados
// ==========================================================

