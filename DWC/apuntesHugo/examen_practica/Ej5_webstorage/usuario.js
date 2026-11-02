// Ejercicio 5 - Web Storage
// NO modifiques el HTML, solo este archivo JavaScript.

// -----------------------------------------------------------------------------
// 1. Selecciona el formulario, el h1#bienvenida y el botón #cerrarSesion.
// -----------------------------------------------------------------------------
const form = document.getElementById("formUsuario");
const bienvenida = document.getElementById("bienvenida");
const cerrar = document.getElementById("cerrarSesion");

// -----------------------------------------------------------------------------
// 2. Crea una función pintar() que lea localStorage y decida qué se muestra:
//    - Si hay usuario: oculta el formulario, muestra "Bienvenido de nuevo, X"
//      y muestra el botón Cerrar sesión.
//    - Si no hay usuario: muestra el formulario, limpia el mensaje y oculta
//      el botón Cerrar sesión.
// -----------------------------------------------------------------------------
function pintar() {
  // TODO: implementa pintar()
}

// -----------------------------------------------------------------------------
// 3. Al enviar el formulario (submit):
//    - prevenir el envío (e.preventDefault())
//    - leer el valor del input#nombreUsuario (con .trim())
//    - si no está vacío, guardarlo en localStorage con clave "usuario"
//    - llamar a pintar()
// -----------------------------------------------------------------------------
form.addEventListener("submit", function (e) {
  // TODO: implementa el login
  e.preventDefault();
});

// -----------------------------------------------------------------------------
// 4. Al hacer clic en el botón Cerrar sesión:
//    - eliminar la clave "usuario" de localStorage
//    - llamar a pintar()
// -----------------------------------------------------------------------------
cerrar.addEventListener("click", function () {
  // TODO: implementa el cierre de sesión
});

// -----------------------------------------------------------------------------
// 5. Al cargar la página, llama a pintar() para establecer el estado inicial.
// -----------------------------------------------------------------------------
// TODO: llama a pintar()
