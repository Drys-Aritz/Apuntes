<?php

function obtenerVideojuego($conexion, $id)
{

    // 1. Preparamos la consulta SQL
    $sql = "SELECT * FROM videojuegos WHERE id = ?";

    // 2. Preparamos la sentencia
    $stmt = $conexion->prepare($sql);

    // 3. Asociamos el ID al interrogante
    $stmt->bind_param("i", $id);

    // 4. Ejecutamos la consulta
    $stmt->execute();

    // 5. Recuperamos el resultado
    $resultado = $stmt->get_result();

    // 6. Obtenemos una fila como array asociativo
    $videojuego = $resultado->fetch_assoc();

    // 7. Cerramos la sentencia
    $stmt->close();

    // 8. Devolvemos el videojuego
    return $videojuego;
}

function obtenerUsuarioPorEmail($conexion, $email)
{

    // 1. Consulta SQL
    $sql = "SELECT * FROM usuarios WHERE email = ?";

    // 2. Preparar consulta
    $stmt = $conexion->prepare($sql);

    // 3. Asociar el correo
    $stmt->bind_param("s", $email);

    // 4. Ejecutar
    $stmt->execute();

    // 5. Obtener resultado
    $resultado = $stmt->get_result();

    // 6. Recuperar el usuario
    $usuario = $resultado->fetch_assoc();

    // 7. Cerrar
    $stmt->close();

    // 8. Devolver resultado
    return $usuario;
}

function existeEmail($conexion, $email)
{

    $usuario = obtenerUsuarioPorEmail($conexion, $email);

    return $usuario !== null;
}
/*
    if (existeEmail($conexion, "ana@gmail.com")) {
        echo "El correo ya está registrado";
    } else {
        echo "El correo está disponible";
    }
*/

function insertarUsuario($conexion, $nombre, $email, $password) {

    $sql = "INSERT INTO usuarios
            (nombre, email, password, rol)
            VALUES (?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);

    // El rol siempre será cliente
    $rol = "cliente";

    $stmt->bind_param(
        "ssss",
        $nombre,
        $email,
        $password,
        $rol
    );

    $resultado = $stmt->execute();

    $stmt->close();

    return $resultado;
}


function existeVideojuego($conexion, $nombre, $plataforma) {

    $sql = "SELECT id FROM videojuegos
            WHERE nombre = ? AND plataforma = ?";

    $stmt = $conexion->prepare($sql);

    $stmt->bind_param("ss", $nombre, $plataforma);

    $stmt->execute();

    $resultado = $stmt->get_result();

    $existe = $resultado->num_rows > 0;

    $stmt->close();

    return $existe;
}


function insertarVideojuego($conexion, $nombre, $genero, $plataforma, $precio, $stock) {

    $sql = "INSERT INTO videojuegos
            (nombre, genero, plataforma, precio, stock)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);

    $stmt->bind_param(
        "sssdi",
        $nombre,
        $genero,
        $plataforma,
        $precio,
        $stock
    );

    $resultado = $stmt->execute();

    $stmt->close();

    return $resultado;
}