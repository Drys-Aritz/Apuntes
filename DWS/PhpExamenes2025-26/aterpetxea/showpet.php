<?php
// __DIR__ fija la ruta a la carpeta del proyecto.
require_once __DIR__ . '/connection.php';
/** @var mysqli $conn La conexión se crea en connection.php. */
// Cargamos las funciones
require_once __DIR__ . '/functions.php';
// Cogemos el id de la URL y lo convertimos a número (0 si no viene)
$id = (int) ($_GET['id'] ?? 0);
// Buscamos la mascota en la base de datos
$pet = getPetById($conn, $id);
// Si la mascota no existe...
if (!$pet) {
    // ...volvemos a la lista de mascotas
    header("Location: pets.php");
    // Paramos el script
    exit;
}
// Si se ha pulsado el botón de cambiar estado y el usuario es admin...
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isAdmin() && isset($_POST['change'])) {
    // Si estaba adoptada pasa a 0, y si no estaba pasa a 1
    $newState = ($pet['adopted'] == 1) ? 0 : 1;
    // Consulta para actualizar el campo adopted
    $sql = "UPDATE pets SET adopted = ? WHERE id = ?";
    // Preparamos la consulta
    $stmt = mysqli_prepare($conn, $sql);
    // Ponemos el nuevo estado y el id en los ?
    mysqli_stmt_bind_param($stmt, "ii", $newState, $id);
    // Ejecutamos la actualización
    mysqli_stmt_execute($stmt);
    // Recargamos la ficha para ver el cambio
    header("Location: showpet.php?id=" . $id);
    // Paramos el script
    exit;
}
// Texto del estado según el valor de adopted
$stateText = ($pet['adopted'] == 1) ? "Adoptatuta" : "Ez adoptatuta";
// Título de la pestaña
$pageTitle = "Maskota: " . $pet['name'];
// Cargamos la cabecera con el menú
include __DIR__ . '/includes/header.php';
?>
<!-- Contenido principal -->
<main>
    <!-- Título con el nombre de la mascota -->
    <h2><?php echo htmlspecialchars($pet['name']); ?></h2>
    <!-- Caja con los datos -->
    <div class="box">
        <?php
        // Si es admin, mostramos también la imagen
        if (isAdmin()) {
            // Imagen de la mascota
            echo '<img class="petimg" src="images/' . htmlspecialchars($pet['image']) . '" alt="' . htmlspecialchars($pet['name']) . '">';
        }
        ?>
        <!-- Tabla con los datos de la mascota -->
        <table>
            <?php
            // Si es admin, mostramos el id (dato extra)
            if (isAdmin()) {
                // Fila del id
                echo '<tr><th>ID</th><td>' . $pet['id'] . '</td></tr>';
            }
            ?>
            <!-- Fila del nombre -->
            <tr><th>Izena</th><td><?php echo htmlspecialchars($pet['name']); ?></td></tr>
            <!-- Fila de la raza -->
            <tr><th>Arraza</th><td><?php echo htmlspecialchars($pet['breed_name']); ?></td></tr>
            <!-- Fila de la edad -->
            <tr><th>Adina</th><td><?php echo $pet['age']; ?> urte</td></tr>
            <?php
            // Si es admin, mostramos tamaño y sexo (datos extra)
            if (isAdmin()) {
                // Fila del tamaño
                echo '<tr><th>Tamaina</th><td>' . htmlspecialchars($pet['size']) . '</td></tr>';
                // Fila del sexo
                echo '<tr><th>Sexua</th><td>' . htmlspecialchars($pet['sex']) . '</td></tr>';
                // Fila del nombre de la imagen
                echo '<tr><th>Irudia</th><td>' . htmlspecialchars($pet['image']) . '</td></tr>';
            }
            ?>
            <!-- Fila del estado -->
            <tr><th>Egoera</th><td><?php echo $stateText; ?></td></tr>
            <!-- Fila de la fecha de entrada -->
            <tr><th>Sarrera data</th><td><?php echo $pet['entry_date']; ?></td></tr>
            <!-- Fila de la descripción -->
            <tr><th>Deskribapena</th><td><?php echo htmlspecialchars($pet['description']); ?></td></tr>
        <!-- Fin de la tabla -->
        </table>
        <!-- Zona de botones -->
        <div class="actions">
            <?php
            // Si el usuario es administrador...
            if (isAdmin()) {
                // Formulario con el botón de cambiar el estado
                echo '<form method="post" action="showpet.php?id=' . $pet['id'] . '">';
                // Campo oculto para saber que se ha pulsado cambiar
                echo '<input type="hidden" name="change" value="1">';
                // Botón de cambiar estado
                echo '<button type="submit">Aldatu (Adoptatua/Ez adoptatua)</button>';
                // Cerramos el formulario
                echo '</form>';
            }
            ?>
            <!-- Botón para volver a la lista -->
            <a class="button back" href="pets.php">Atzera itzuli</a>
            <?php
            // El botón de ezabatu solo sale si es admin y la mascota está adoptada
            if (isAdmin() && $pet['adopted'] == 1) {
                // Enlace a la página de confirmación de baja
                echo '<a class="button danger" href="delete.php?id=' . $pet['id'] . '">Ezabatu</a>';
            }
            ?>
        <!-- Fin de la zona de botones -->
        </div>
    <!-- Fin de la caja -->
    </div>
<!-- Fin del contenido principal -->
</main>
<?php
// Cargamos el pie de página
include __DIR__ . '/includes/footer.php';
?>
