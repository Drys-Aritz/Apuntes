<?php
header('Content-Type: application/json; charset=utf-8');
$config = require 'config.php';
$entrada = json_decode(file_get_contents('php://input'), true);
$tema = trim($entrada['tema'] ?? '');
if ($tema === '') {
    http_response_code(400);
    echo json_encode(['error' => 'Debes indicar un tema']);
    exit;
}
$url = 'https://api.groq.com/openai/v1/chat/completions';
$schema = [
    'type' => 'object',
    'properties' => [
        'pregunta' => ['type' => 'string'],
        'opciones' => [
            'type' => 'array',
            'items' => ['type' => 'string'],
            'minItems' => 3,
            'maxItems' => 3
        ],
        'correcta' => ['type' => 'integer', 'minimum' => 0, 'maximum' => 2],
        'pista' => ['type' => 'string']
    ],
    'required' =>
    ['pregunta', 'opciones', 'correcta', 'pista'],
    'additionalProperties' => false
];
$payload = [
    'model' => 'openai/gpt-oss-20b',
    'messages' => [
        [
            'role' => 'system',
            'content' => 'Generas preguntas educativas para niños de 8 años.'
        ],
        [
            'role' => 'user',
            'content' => "Genera una pregunta sobre: {$tema}. "
                . "Debe tener exactamente 3 opciones. "
                . "La pista no debe decir directamente la respuesta."
        ]
    ],
    'response_format' => ['type' => 'json_schema', 'json_schema' => [
        'name' => 'pregunta_educativa',
        'strict' =>
        true,
        'schema' => $schema
    ]]
];
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
    echo json_encode([
        'error' =>
        $datos['error']['message']
            ?? 'Error al llamar a Groq'
    ]);
    exit;
}
$contenido =
    $datos['choices'][0]['message']['content']
    ?? '{}';
$pregunta = json_decode($contenido, true);
if (!is_array($pregunta)) {
    http_response_code(500);
    echo json_encode(['error' => 'La IA no devolvió JSON válido']);
    exit;
}
echo json_encode($pregunta, JSON_UNESCAPED_UNICODE);
