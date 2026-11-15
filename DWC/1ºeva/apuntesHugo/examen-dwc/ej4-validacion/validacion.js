/* EJERCICIO 4 - VALIDACIÓN (2025-26 y 2024-25). Validar con JS, NO solo con HTML5.
   Cada función de validación DEVUELVE true/false. Una función general las junta. */
const regexTexto = /^[A-Za-zÁÉÍÓÚÜáéíóúüÑñ ]{3,50}$/;   // letras (con tildes/ñ) y espacios, 3-50

function validarTexto(valor) { return regexTexto.test(valor.trim()); }

function validarAnio(valor) {
  return /^\d{4}$/.test(valor) && Number(valor) >= 1900 && Number(valor) <= 2099;
}

function validarCategoria(valor) { return valor !== ""; }

function validarPrecio(valor) {
  const n = Number(valor);
  return valor.trim() !== "" && !isNaN(n) && n >= 0 && n <= 9999;
}

function validarLongitud(valor, min, max) {          // para descripción 3-500, título 3-50...
  return valor.length >= min && valor.length <= max;
}

// Fecha NO inferior a hoy (se compara sin horas)
function validarFecha(valor) {
  if (valor === "") return false;
  const hoy = new Date(); hoy.setHours(0, 0, 0, 0);
  const elegida = new Date(valor); elegida.setHours(0, 0, 0, 0);
  return elegida >= hoy;
}

// Función general: junta errores para mostrarlos todos a la vez
function validarFormulario() {
  const errores = [];
  if (!validarTexto(document.getElementById("titulo").value)) errores.push("Título: 3-50 letras");
  if (!validarTexto(document.getElementById("director").value)) errores.push("Director: 3-50 letras");
  if (!validarAnio(document.getElementById("anio").value)) errores.push("Año: 4 dígitos entre 1900 y 2099");
  if (!validarCategoria(document.getElementById("categoria").value)) errores.push("Categoría: no puede estar vacía");
  return errores;
}

document.getElementById("formulario").addEventListener("submit", function (e) {
  e.preventDefault();                                   // el formulario NO se envía
  const errores = validarFormulario();
  const mensaje = document.getElementById("mensaje");
  if (errores.length > 0) {
    alert(errores.join("\n"));                          // todos juntos en un solo alert
    mensaje.textContent = "";
  } else {
    mensaje.textContent = "Película validada correctamente";
  }
});
