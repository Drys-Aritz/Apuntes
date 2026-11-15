// Ejercicio 4 - Validación de formularios (SOLUCIÓN)

const reTexto = /^[a-záéíóúñü\s]{3,50}$/i;   // letras, acentos y espacios, 3-50
const rePrecio = /^\d{1,4}$/;                 // hasta 4 dígitos (0-9999)

const form = document.getElementById("formulario");
const mensaje = document.getElementById("mensaje");

form.addEventListener("submit", function (e) {
  e.preventDefault(); // nunca se envía

  let nombre = document.getElementById("nombre").value.trim();
  let marca = document.getElementById("marca").value.trim();
  let precio = document.getElementById("precio").value.trim();
  let categoria = document.getElementById("categoria").value;

  let errores = [];

  if (!reTexto.test(nombre)) errores.push("Nombre: 3-50 letras.");
  if (!reTexto.test(marca)) errores.push("Marca: 3-50 letras.");
  if (!rePrecio.test(precio) || Number(precio) < 0 || Number(precio) > 9999) {
    errores.push("Precio: entero entre 0 y 9999.");
  }
  if (categoria === "") errores.push("Elige categoría.");

  if (errores.length > 0) {
    mensaje.textContent = errores.join(" · ");
    mensaje.style.color = "red";
  } else {
    mensaje.textContent = "Zapatilla validada correctamente";
    mensaje.style.color = "green";
  }
});
