<?php
header('Content-Type: application/json; charset=utf-8');
$config = require 'config.php';
$entrada = json_decode(file_get_contents('php://input'), true);
$prompt = trim($entrada['prompt'] ?? '');
if ($prompt === '') {
    http_response_code(400);
    echo json_encode(['error' => 'Debes escribir un prompt']);
    exit;
}
$url = 'https://api.groq.com/openai/v1/chat/completions';
$payload = ['model' => 'openai/gpt-oss-20b', 'messages' => [['role' => 'system', 'content' => 'Eres un profesor de Primaria. ' . 'Explicas con vocabulario
sencillo.'], ['role' => 'user', 'content' => $prompt]], 'temperature' => 0.4];
$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $config['groq_key']
    ],
    CURLOPT_POSTFIELDS =>
    json_encode($payload, JSON_UNESCAPED_UNICODE),
    CURLOPT_TIMEOUT => 60
]);
$respuesta = curl_exec($ch);
if ($respuesta === false) {
    $error = curl_error($ch);
    curl_close($ch);
    http_response_code(500);
    echo json_encode(['error' => 'Error cURL: ' . $error]);
    exit;
}
$codigoHttp = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
$datos = json_decode($respuesta, true);
if ($codigoHttp >= 400) {
    http_response_code($codigoHttp);
    echo json_encode(['error' => $datos['error']['message'] ?? 'Error al llamar a Groq']);
    exit;
}
$texto =
    $datos['choices'][0]['message']['content']
    ?? '';
echo json_encode(['texto' => $texto], JSON_UNESCAPED_UNICODE);
