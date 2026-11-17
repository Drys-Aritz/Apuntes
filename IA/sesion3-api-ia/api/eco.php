<?php
header('Content-Type: application/json; charset=utf-8');
$contenido = file_get_contents('php://input');
$datos = json_decode($contenido, true);
if (!is_array($datos)) {
    http_response_code(400);
    echo json_encode([
        'error' => 'El cuerpo recibido no contiene JSON válido'
    ]);
    exit;
}
echo json_encode([
    'recibido' => $datos
], JSON_UNESCAPED_UNICODE);
