<?php
// =========================================================
// APUNTES PHP: variables, condiciones, bucles, arrays y funciones
// =========================================================

// 1. Variables: en PHP comienzan con $
$name = "Ana";          // string
$age = 25;              // int
$price = 12.50;         // float
$isActive = true;       // bool
$nothing = null;        // null

// Concatenación de cadenas con punto
echo "Hola, " . $name;

// Interpolación de variables en comillas dobles
echo "Tienes $age años";

// 2. Condicionales
if ($age >= 18) {
    echo "Mayor de edad";
} else {
    echo "Menor de edad";
}

// Comparación: == compara valores; === también exige mismo tipo.
if ($age === 25) {
    echo "Edad exacta";
}

// 3. Switch
$status = "pendiente";
switch ($status) {
    case "pendiente":
        echo "Queda trabajo";
        break;
    case "completada":
        echo "Terminado";
        break;
    default:
        echo "Estado desconocido";
}

// 4. Bucles
for ($i = 0; $i < 3; $i++) {
    echo $i;
}

$colors = ["azul", "verde", "rojo"];
foreach ($colors as $color) {
    echo $color;
}

// 5. Arrays indexados y asociativos
$numbers = [10, 20, 30];
echo $numbers[0]; // índices empiezan en 0

$user = [
    "id" => 1,
    "name" => "Luis",
    "role" => "admin"
];
echo $user["name"];

// Array de arrays asociativos
$users = [
    ["id" => 1, "name" => "Ana"],
    ["id" => 2, "name" => "Luis"]
];

foreach ($users as $item) {
    echo $item["name"];
}

// 6. Funciones: agrupar lógica reutilizable
function sumNumbers(int $a, int $b): int {
    return $a + $b;
}
echo sumNumbers(3, 4);

// 7. Recibir datos de formularios tradicionales
// $_GET: parámetros en la URL.
// $_POST: datos enviados mediante un formulario POST.
// Valida siempre los datos recibidos: no confíes en el navegador.
$search = trim($_GET["q"] ?? "");

// Ejemplo de validación de texto
$title = trim($_POST["title"] ?? "");
if ($title === "") {
    // En una aplicación web se devolvería un error adecuado.
    echo "El título es obligatorio";
}

// 8. Mostrar texto escapado en HTML para evitar inyección de etiquetas
$untrustedText = $_GET["name"] ?? "";
echo htmlspecialchars(
    $untrustedText,
    ENT_QUOTES | ENT_SUBSTITUTE,
    "UTF-8"
);

// 9. JSON: útil para crear API
$data = [
    "success" => true,
    "message" => "Operación correcta"
];

header("Content-Type: application/json; charset=utf-8");
echo json_encode($data);

// Nota: un endpoint real debe controlar respuestas, códigos HTTP,
// validación, autenticación/autorización y errores de forma coherente.
?>
