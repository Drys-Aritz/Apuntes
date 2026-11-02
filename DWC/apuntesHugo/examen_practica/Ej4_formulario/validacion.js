// Ejercicio 4 - Validación de formularios
// NO modifiques el HTML, solo este archivo JavaScript.

// -----------------------------------------------------------------------------
// 1. Expresiones regulares (complétalas):
//    - Texto: entre 3 y 50 caracteres alfabéticos (con acentos, ñ y espacios).
//    - Precio: número entero entre 0 y 9999.
// -----------------------------------------------------------------------------
const reTexto = /^[a-záéíóúñü\s]{3,50}$/i;
const rePrecio = /^\d{1,4}$/;

// -----------------------------------------------------------------------------
// 2. Selecciona el formulario y el div#mensaje.
// -----------------------------------------------------------------------------
const form = document.getElementById("formulario");
const mensaje = document.getElementById("mensaje");

// -----------------------------------------------------------------------------
// 3. Asocia el evento submit al formulario.
//    Recuerda llamar a e.preventDefault() para que no se envíe.
// -----------------------------------------------------------------------------
form.addEventListener("submit", function (e) {
  // TODO: implementa la validación completa
  // - Lee los valores con .value.trim()
  // - Valida nombre, marca (regex reTexto)
  // - Valida precio (regex rePrecio y rango 0-9999)
  // - Valida categoría (no vacía)
  // - Muestra los errores en mensaje.textContent (color rojo) o el éxito (color verde)
  e.preventDefault();
});
