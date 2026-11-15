/* VERSIÓN CORREGIDA. Errores del buggy.js:
   1) getElementByID -> getElementById (mayúsculas: typo de escritura)
   2) if (x.value = "") usa "=" (asigna) -> "===" (compara)
   3) errores se mostraba como array -> join("<br>") / usar textContent con join
   4) "errores.length = 0" asigna -> "=== 0"
   5) addEventListener("click", validar()) EJECUTA la función al cargar -> pasar la referencia: validar
   6) "resultado" no estaba definida (variable inexistente) -> getElementById("resultado")
   7) edad.value < 18 compara texto -> Number(edad.value)
   8) (orden) el div de errores debe limpiarse y la parte inferior volver a ocultarse en cada validación
   9) Reset: se pide AÑADIRLO siguiendo la lógica del programa */
const nombre = document.getElementById("nombre");
const edad = document.getElementById("edad");
const email = document.getElementById("email");
const divErrores = document.getElementById("errores");
const inferior = document.getElementById("inferior");
const resultado = document.getElementById("resultado");
const actividad = document.getElementById("actividad");

function validar() {
  const errores = [];
  if (nombre.value.trim() === "") errores.push("Nombre obligatorio");
  else if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/.test(nombre.value)) errores.push("Nombre: solo letras y espacios");
  if (edad.value.trim() === "" || isNaN(edad.value)) errores.push("Edad inválida");
  if (email.value.trim() === "") errores.push("Email obligatorio");

  divErrores.textContent = errores.join(" | ");
  inferior.style.display = errores.length === 0 ? "block" : "none";
}

function mostrarMensaje() {
  if (actividad.value === "") { resultado.textContent = ""; return; }
  if (actividad.value === "riesgo" && Number(edad.value) < 18) {
    resultado.textContent = "Error: menor de 18 en actividad de riesgo";
  } else {
    resultado.textContent = "Gracias por participar";
  }
}

function reset() {                                   // deja el formulario como al principio
  document.getElementById("formulario").reset();
  divErrores.textContent = "";
  resultado.textContent = "";
  actividad.value = "";
  inferior.style.display = "none";
}

document.getElementById("validar").addEventListener("click", validar);   // SIN paréntesis
actividad.addEventListener("change", mostrarMensaje);
document.getElementById("reset").addEventListener("click", reset);
