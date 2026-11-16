<?php
// Función que devuelve las 3 razas con más mascotas
function getPopularBreeds($conn) {
    // Consulta: cuenta las mascotas de cada raza y se queda con las 3 primeras
    $sql = "SELECT b.name, COUNT(p.id) AS total
            FROM breeds b
            INNER JOIN pets p ON p.breed_id = b.id
            GROUP BY b.id, b.name
            ORDER BY total DESC
            LIMIT 3";
    // Ejecutamos la consulta
    $result = mysqli_query($conn, $sql);
    // Array vacío donde guardaremos el resultado
    $breeds = [];
    // Recorremos cada fila del resultado
    while ($row = mysqli_fetch_assoc($result)) {
        // Guardamos en formato ['nombre raza' => cantidad]
        $breeds[$row['name']] = (int) $row['total'];
    }
    // Devolvemos el array asociativo
    return $breeds;
}

// Función que devuelve el porcentaje de mascotas adoptadas y disponibles
function getAdoptionPercentage($conn) {
    // Consulta: total de mascotas y cuántas están adoptadas
    $sql = "SELECT COUNT(*) AS total, SUM(adopted = 1) AS adoptadas FROM pets";
    // Ejecutamos la consulta
    $result = mysqli_query($conn, $sql);
    // Cogemos la única fila que devuelve
    $row = mysqli_fetch_assoc($result);
    // Guardamos el total de mascotas
    $total = (int) $row['total'];
    // Guardamos cuántas están adoptadas
    $adoptadas = (int) $row['adoptadas'];
    // Si no hay mascotas, devolvemos 0% para no dividir entre cero
    if ($total == 0) {
        // Devolvemos los dos porcentajes a cero
        return ['adoptatuak' => 0, 'eskuragarri' => 0];
    }
    // Calculamos el porcentaje de adoptadas con un decimal
    $porcentajeAdoptadas = round($adoptadas * 100 / $total, 1);
    // El porcentaje disponible es lo que falta hasta 100
    $porcentajeDisponibles = round(100 - $porcentajeAdoptadas, 1);
    // Devolvemos el array asociativo con los dos porcentajes
    return ['adoptatuak' => $porcentajeAdoptadas, 'eskuragarri' => $porcentajeDisponibles];
}

// Función que devuelve las mascotas adoptadas (1) o no adoptadas (0), las más antiguas primero
function getPets($conn, $adopted) {
    // Consulta con un ? para el valor de adopted, ordenada por fecha de entrada
    $sql = "SELECT * FROM pets WHERE adopted = ? ORDER BY entry_date ASC";
    // Preparamos la consulta
    $stmt = mysqli_prepare($conn, $sql);
    // Ponemos el valor en el ? (i = número entero)
    mysqli_stmt_bind_param($stmt, "i", $adopted);
    // Ejecutamos la consulta
    mysqli_stmt_execute($stmt);
    // Obtenemos el resultado
    $result = mysqli_stmt_get_result($stmt);
    // Devolvemos todas las filas como array
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Función que devuelve una mascota con el nombre de su raza (o null si no existe)
function getPetById($conn, $id) {
    // Consulta que une pets con breeds para sacar el nombre de la raza
    $sql = "SELECT p.*, b.name AS breed_name
            FROM pets p
            INNER JOIN breeds b ON p.breed_id = b.id
            WHERE p.id = ?";
    // Preparamos la consulta
    $stmt = mysqli_prepare($conn, $sql);
    // Ponemos el id en el ?
    mysqli_stmt_bind_param($stmt, "i", $id);
    // Ejecutamos la consulta
    mysqli_stmt_execute($stmt);
    // Obtenemos el resultado
    $result = mysqli_stmt_get_result($stmt);
    // Devolvemos la fila (o null si no hay)
    return mysqli_fetch_assoc($result);
}

// Función que dice si el usuario ha iniciado sesión como administrador
function isAdmin() {
    // Es admin si existe la variable de sesión con su nombre
    return isset($_SESSION['admin_name']);
}

// Función que pinta las mascotas de tres en tres
function printPets($pets, $emptyMessage) {
    // Contamos cuántas mascotas hay
    $total = count($pets);
    // Si no hay ninguna...
    if ($total == 0) {
        // ...mostramos el mensaje que nos han pasado
        echo '<p class="empty">' . $emptyMessage . '</p>';
        // Salimos de la función
        return;
    }
    // Recorremos las mascotas una a una con un contador
    for ($i = 0; $i < $total; $i++) {
        // Guardamos la mascota actual
        $pet = $pets[$i];
        // Si es la primera de cada 3 (posición 0, 3, 6...), abrimos una fila
        if ($i % 3 == 0) {
            // Abrimos la fila
            echo '<div class="row">';
        }
        // Abrimos la tarjeta de la mascota
        echo '<div class="card">';
        // Mostramos la imagen de la mascota
        echo '<img src="images/' . htmlspecialchars($pet['image']) . '" alt="' . htmlspecialchars($pet['name']) . '">';
        // Mostramos el nombre
        echo '<h3>' . htmlspecialchars($pet['name']) . '</h3>';
        // Botón que lleva a la ficha de la mascota
        echo '<a class="button" href="showpet.php?id=' . $pet['id'] . '">Informazio gehiago ikusi</a>';
        // Cerramos la tarjeta
        echo '</div>';
        // Si es la tercera de la fila (posición 2, 5, 8...) o la última mascota, cerramos la fila
        if ($i % 3 == 2 || $i == $total - 1) {
            // Cerramos la fila
            echo '</div>';
        }
    }
}
?>
