<?php
declare(strict_types=1);

$host = getenv('DB_HOST');
$database = getenv('DB_NAME');
$user = getenv('DB_USER');
$passwordFile = '/run/secrets/db_password';

if ($host === false || $database === false || $user === false || !is_readable($passwordFile)) {
    http_response_code(500);
    exit('No se pudo cargar la configuración de la base de datos.');
}

$password = trim((string) file_get_contents($passwordFile));
$maximumPrice = null;
$hasPriceFilter = array_key_exists('precio_max', $_GET);

if ($hasPriceFilter) {
    $rawMaximumPrice = filter_input(INPUT_GET, 'precio_max', FILTER_VALIDATE_FLOAT);
    if ($rawMaximumPrice === false || $rawMaximumPrice === null || $rawMaximumPrice < 0) {
        http_response_code(400);
        exit('El parámetro precio_max debe ser un número mayor o igual que cero.');
    }
    $maximumPrice = (float) $rawMaximumPrice;
}

try {
    $pdo = new PDO(
        "mysql:host={$host};dbname={$database};charset=utf8mb4",
        $user,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    if ($hasPriceFilter) {
        $statement = $pdo->prepare(
            'SELECT id, nombre, precio, stock FROM productos WHERE precio <= :precio_max ORDER BY id'
        );
        $statement->execute(['precio_max' => $maximumPrice]);
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $products = $pdo->query('SELECT id, nombre, precio, stock FROM productos ORDER BY id')
            ->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $exception) {
    error_log($exception->getMessage());
    http_response_code(500);
    exit('No se pudieron cargar los productos.');
}

function escapeHtml(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos | Tienda</title>
    <style>
        :root { color-scheme: light; font-family: system-ui, sans-serif; color: #172033; background: #f3f6fb; }
        body { margin: 0; padding: 3rem 1rem; }
        main { max-width: 900px; margin: auto; padding: 2rem; background: white; border-radius: 12px; box-shadow: 0 8px 28px #17203318; }
        h1 { margin-top: 0; color: #164e63; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: .85rem 1rem; text-align: left; border-bottom: 1px solid #dbe3ec; }
        th { background: #ecfeff; color: #155e75; }
        td:nth-child(1), td:nth-child(3), td:nth-child(4) { text-align: right; }
        tbody tr:hover { background: #f8fafc; }
        .count { color: #526174; }
    </style>
</head>
<body>
<main>
    <h1>Productos de la tienda</h1>
    <?php if ($hasPriceFilter): ?>
        <p class="count">Productos de hasta <?= escapeHtml(number_format($maximumPrice, 2, ',', '.')) ?> €</p>
    <?php else: ?>
        <p class="count">Todos los productos</p>
    <?php endif; ?>
    <table>
        <thead><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th></tr></thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= escapeHtml((string) $product['id']) ?></td>
                <td><?= escapeHtml((string) $product['nombre']) ?></td>
                <td><?= escapeHtml(number_format((float) $product['precio'], 2, ',', '.')) ?> €</td>
                <td><?= escapeHtml((string) $product['stock']) ?></td>
            </tr>
        <?php endforeach; ?>
        <?php if ($products === []): ?>
            <tr><td colspan="4">No hay productos con ese precio máximo.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</main>
</body>
</html>
