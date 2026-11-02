/* VERSIÓN CON ERRORES (practica: encuéntralos). Solo se puede tocar el JS. */
const nombre = document.getElementByID("nombre");
const edad = document.getElementById("edad");
const email = document.getElementById("email");

function validar() {
  let errores = [];
  if (nombre.value = "") errores.push("Nombre obligatorio");
  if (!/^[A-Za-z ]+$/.test(nombre.value)) errores.push("Nombre: solo letras");
  if (edad.value === "" || isNaN(edad.value)) errores.push("Edad inválida");
  if (email.value == "") errores.push("Email obligatorio");
  document.getElementById("errores").textContent = errores;      // se acumulan entre pulsaciones
  if (errores.length = 0) document.getElementById("inferior").style.display = "block";
}
document.getElementById("validar").addEventListener("click", validar());
document.getElementById("actividad").addEventListener("change", function () {
  if (this.value === "riesgo" && edad.value < 18) resultado.textContent = "Error: menor en actividad de riesgo";
  else document.getElementById("resultado").textContent = "Gracias";
});
