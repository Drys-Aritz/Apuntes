/* 3. FORMULARIO (script.js) */
const descargas = [];

// Sin condicionales: el id del input del contenedor coincide con el color en minúsculas
function actualizarKg(color, kg) {
  const input = document.getElementById(color.toLowerCase());
  input.value = Number(input.value) + kg;                // 20 + 10 = 30 (Number: value es texto)
}

function fechaHoy() {
  const d = new Date();
  const dd = String(d.getDate()).padStart(2, "0");
  const mm = String(d.getMonth() + 1).padStart(2, "0");   // getMonth() empieza en 0
  return `${dd}/${mm}/${d.getFullYear()}`;
}

document.getElementById("formDescarga").addEventListener("submit", function (e) {
  e.preventDefault();                                     // no se envía el formulario

  const nombre = document.getElementById("nombre").value;
  const kg = document.getElementById("kg").value;
  const select = document.getElementById("contenedor");

  const errores = validar(nombre, kg);
  if (errores.length > 0) { alert(errores.join("\n")); return; }   // todos en UN alert; se para

  const opcion = select.options[select.selectedIndex];     // el option elegido
  const descarga = new Descarga(opcion.value, opcion.text, Number(kg), nombre);  // color=value, residuo=text

  // El párrafo se construye con el OBJETO y sus getters, no con los valores del formulario
  const p = document.createElement("p");
  p.textContent = `${descarga.nombre} ha descargado ${descarga.kg} kg de residuo ${descarga.residuo} en el contenedor ${descarga.color} el día ${fechaHoy()}`;
  pintarColor(p, descarga);
  document.getElementById("descargas").appendChild(p);

  actualizarKg(descarga.color, descarga.kg);
  addArray(descargas, descarga);                            // añade y muestra por consola
});
