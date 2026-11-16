<?php
// __DIR__ fija la ruta a la carpeta del proyecto.
require_once __DIR__ . '/connection.php';
/** @var mysqli $conn La conexión se crea en connection.php. */
// Cargamos las funciones
require_once __DIR__ . '/functions.php';
// Cogemos el id de la URL (GET) o del formulario (POST)
$id = (int) ($_REQUEST['id'] ?? 0);
// Buscamos la mascota en la base de datos
$pet = getPetById($conn, $id);
// Solo se puede borrar si es admin, la mascota existe y está adoptada
if (!isAdmin() || !$pet || $pet['adopted'] != 1) {
    // Si no se cumple, volvemos a la lista de mascotas
    header("Location: pets.php");
    // Paramos el script
    exit;
}
// Si se ha pulsado el botón de confirmar la baja...
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm'])) {
    // Consulta para borrar la mascota
    $sql = "DELETE FROM pets WHERE id = ?";
    // Preparamos la consulta
    $stmt = mysqli_prepare($conn, $sql);
    // Ponemos el id en el ?
    mysqli_stmt_bind_param($stmt, "i", $id);
    // Ejecutamos el borrado
    mysqli_stmt_execute($stmt);
    // Volvemos a la lista de mascotas
    header("Location: pets.php");
    // Paramos el script
    exit;
}
// Título de la pestaña
$pageTitle = "Maskota ezabatu";
// Cargamos la cabecera con el menú
include __DIR__ . '/includes/header.php';
?>
<!-- Contenido principal -->
<main>
    <!-- Pregunta de confirmación -->
    <h2>Ziur zaude maskota hau baja eman nahi duzula?</h2>
    <!-- Caja con los datos de la mascota -->
    <div class="box">
        <!-- Imagen de la mascota -->
        <img class="petimg" src="images/<?php echo htmlspecialchars($pet['image']); ?>" alt="<?php echo htmlspecialchars($pet['name']); ?>">
        <!-- Tabla con los datos -->
        <table>
            <!-- Fila del nombre -->
            <tr><th>Izena</th><td><?php echo htmlspecialchars($pet['name']); ?></td></tr>
            <!-- Fila de la raza -->
            <tr><th>Arraza</th><td><?php echo htmlspecialchars($pet['breed_name']); ?></td></tr>
            <!-- Fila de la edad -->
            <tr><th>Adina</th><td><?php echo $pet['age']; ?> urte</td></tr>
            <!-- Fila del tamaño -->
            <tr><th>Tamaina</th><td><?php echo htmlspecialchars($pet['size']); ?></td></tr>
            <!-- Fila del sexo -->
            <tr><th>Sexua</th><td><?php echo htmlspecialchars($pet['sex']); ?></td></tr>
            <!-- Fila del estado -->
            <tr><th>Egoera</th><td>Adoptatuta</td></tr>
            <!-- Fila de la fecha de entrada -->
            <tr><th>Sarrera data</th><td><?php echo $pet['entry_date']; ?></td></tr>
            <!-- Fila de la descripción -->
            <tr><th>Deskribapena</th><td><?php echo htmlspecialchars($pet['description']); ?></td></tr>
        <!-- Fin de la tabla -->
        </table>
        <!-- Zona de botones -->
        <div class="actions">
            <!-- Formulario que confirma el borrado por POST -->
            <form method="post" action="delete.php">
                <!-- Campo oculto con el id de la mascota -->
                <input type="hidden" name="id" value="<?php echo $pet['id']; ?>">
                <!-- Campo oculto que indica que se ha confirmado -->
                <input type="hidden" name="confirm" value="1">
                <!-- Botón que borra la mascota -->
                <button type="submit" class="danger">Ados, baja eman</button>
            <!-- Fin del formulario -->
            </form>
            <!-- Botón para volver sin borrar -->
            <a class="button back" href="pets.php">Atzera itzuli</a>
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
