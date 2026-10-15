
<?php

header('Content-Type: application/json; charset=utf-8');

// Convertir un array PHP en una respuesta JSON y finalizar.
function respond($data, $status = 200) {
    http_response_code($status);
    echo json_encode($data);
    exit;
}

try {
    // Cargar la conexión con la base de datos.
    require __DIR__ . '/db.php';

    $method = $_SERVER['REQUEST_METHOD'];

    // Leer el identificador de la URL, si existe.
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    // GET: consultar todas las tareas.
    if ($method === 'GET') {
        $stmt = $pdo->query(
            'SELECT * FROM tasks ORDER BY created_at DESC'
        );

        respond($stmt->fetchAll());
    }

    // POST: crear una tarea.
    if ($method === 'POST') {
        $data = json_decode(
            file_get_contents('php://input'),
            true
        );

        $title = trim($data['title'] ?? '');
        $description = trim($data['description'] ?? '');
        $priority = $data['priority'] ?? 'media';

        // Validar los campos recibidos.
        if ($title === '' || mb_strlen($title) > 150) {
            respond(['error' => 'Título no válido'], 400);
        }

        if (!in_array($priority, ['baja', 'media', 'alta'], true)) {
            respond(['error' => 'Prioridad no válida'], 400);
        }

        // Los parámetros evitan concatenar datos en SQL.
        $stmt = $pdo->prepare(
            'INSERT INTO tasks (title, description, priority)
             VALUES (:title, :description, :priority)'
        );

        $stmt->execute([
            'title' => $title,
            'description' => $description,
            'priority' => $priority
        ]);

        respond([
            'id' => (int) $pdo->lastInsertId(),
            'message' => 'Tarea creada'
        ], 201);
    }

    // PATCH: actualizar el estado de una tarea.
    if ($method === 'PATCH') {
        if (!$id || $id < 1) {
            respond(['error' => 'ID no válido'], 400);
        }

        $data = json_decode(
            file_get_contents('php://input'),
            true
        );

        $status = $data['status'] ?? '';

        if (!in_array($status, ['pendiente', 'completada'], true)) {
            respond(['error' => 'Estado no válido'], 400);
        }

        $stmt = $pdo->prepare(
            'UPDATE tasks SET status = :status WHERE id = :id'
        );

        $stmt->execute([
            'status' => $status,
            'id' => $id
        ]);

        // rowCount() puede ser cero si el valor no cambia.
        $check = $pdo->prepare('SELECT id FROM tasks WHERE id = ?');
        $check->execute([$id]);

        if (!$check->fetch()) {
            respond(['error' => 'Tarea no encontrada'], 404);
        }

        respond(['message' => 'Tarea actualizada']);
    }

    // DELETE: eliminar una tarea.
    if ($method === 'DELETE') {
        if (!$id || $id < 1) {
            respond(['error' => 'ID no válido'], 400);
        }

        $stmt = $pdo->prepare(
            'DELETE FROM tasks WHERE id = :id'
        );

        $stmt->execute(['id' => $id]);

        if ($stmt->rowCount() === 0) {
            respond(['error' => 'Tarea no encontrada'], 404);
        }

        respond(['message' => 'Tarea eliminada']);
    }

    // No se admiten otros métodos HTTP.
    header('Allow: GET, POST, PATCH, DELETE');
    respond(['error' => 'Método no permitido'], 405);

} catch (Throwable $e) {
    // Registrar el detalle en el servidor, no en la respuesta pública.
    error_log($e->getMessage());

    respond(['error' => 'Error interno del servidor'], 500);
}
