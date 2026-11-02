
// Ejercicio 4 - Validación de formulario
const form = document.getElementById("formPelicula");
const mensaje = document.getElementById("mensaje");

const reTexto = /^[a-záéíóúñü\s]{3,50}$/i;  // letras (con acentos), espacios, 3-50
const reAnio = /^(19|20)\d{2}$/;            // 4 dígitos entre 1900 y 2099

form.addEventListener("submit", function (e) {
  e.preventDefault(); // nunca se envía

  let titulo = document.getElementById("titulo").value.trim();
  let director = document.getElementById("director").value.trim();
  let anio = document.getElementById("anio").value.trim();
  let categoria = document.getElementById("categoria").value;

  let errores = [];
  if (!reTexto.test(titulo)) errores.push("Título: 3-50 letras.");
  if (!reTexto.test(director)) errores.push("Director: 3-50 letras.");
  if (!reAnio.test(anio)) errores.push("Año: 1900-2099.");
  if (categoria === "") errores.push("Elige categoría.");

  if (errores.length > 0) {
    mensaje.textContent = errores.join(" · ");
    mensaje.style.color = "red";
  } else {
    mensaje.textContent = "Película validada correctamente";
    mensaje.style.color = "green";
  }
});
