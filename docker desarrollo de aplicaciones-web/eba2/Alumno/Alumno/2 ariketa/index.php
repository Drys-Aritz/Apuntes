<?php
/**
 * Archivo de prueba para CI con GitHub Actions
 * Valida sintaxis PHP y muestra información básica
 */

declare(strict_types=1);

$fecha = date('Y-m-d H:i:s');

$response = [
    'status' => 'ok',
    'mensaje' => 'Aplicación PHP funcionando correctamente',
    'fecha' => $fecha
];

header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
