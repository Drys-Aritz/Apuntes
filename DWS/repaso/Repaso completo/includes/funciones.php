<?php
function validarId($id)
{
    return filter_var($id, FILTER_VALIDATE_INT) !== false
        && $id > 0;
}

function validarCantidad($cantidad)
{

    return filter_var($cantidad, FILTER_VALIDATE_INT) !== false
        && $cantidad > 0;
}

function validarPrecio($precio)
{

    return is_numeric($precio) && $precio > 0;
}

function calcularSubtotal($precio, $cantidad)
{

    return $precio * $cantidad;
}

function calcularTotal($lineas)
{

    $total = 0;

    foreach ($lineas as $linea) {

        $total += $linea['subtotal'];
    }

    return $total;
}

function estaLogueado()
{

    return isset($_SESSION['id_usuario']);
}

function esAdmin()
{

    return estaLogueado() && $_SESSION['rol'] === 'admin';
}
