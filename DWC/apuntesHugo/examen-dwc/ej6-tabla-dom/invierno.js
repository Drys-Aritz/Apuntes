/* EJERCICIO 6 - FORMULARIOS Y DOM (2022-23): tabla, validar con UNA función para nombre y país,
   colorear/decolorear filas, borrarFormulario, borrarUltimo. Imágenes en img/Alemania.png */
const reLetras = /^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/;

// UNA función para nombre y país; recibe el input y su "etiqueta" para decir cuál falla
function validarTexto(input, etiqueta) {
  if (input.value.trim() === "") { alert(`${etiqueta}: campo obligatorio`); return false; }
  if (!reLetras.test(input.value)) { alert(`${etiqueta}: solo letras y espacios`); return false; }
  return true;
}
function validarNota(input) {
  const n = Number(input.value);
  if (input.value.trim() === "" || isNaN(n) || n < 0 || n > 100) {
    alert("Puntuación: número entre 0 y 100"); return false;
  }
  return true;
}

const nombre = document.getElementById("nombre");
const puntuacion = document.getElementById("puntuacion");
const pais = document.getElementById("pais");

// Validar al SALIR de cada campo (evento blur)
nombre.addEventListener("blur", () => validarTexto(nombre, "Nombre"));
pais.addEventListener("blur", () => validarTexto(pais, "País"));
puntuacion.addEventListener("blur", () => validarNota(puntuacion));

function colorear() { this.style.backgroundColor = "red"; }
function decolorear() { this.style.backgroundColor = ""; }       // "" = color inicial

function crear() {
  if (!(validarTexto(nombre, "Nombre") && validarNota(puntuacion) && validarTexto(pais, "País"))) return;
  const tbody = document.querySelector("#participantes tbody");
  const tr = document.createElement("tr");

  const tdNombre = document.createElement("td"); tdNombre.textContent = nombre.value;
  const tdPunt = document.createElement("td"); tdPunt.textContent = puntuacion.value;

  const tdPais = document.createElement("td");
  const img = document.createElement("img");
  img.src = `img/${pais.value}.png`; img.alt = pais.value; img.width = 24;
  tdPais.appendChild(img);
  tdPais.appendChild(document.createTextNode(" " + pais.value));   // imagen y DESPUÉS el nombre

  tr.append(tdNombre, tdPunt, tdPais);
  tr.addEventListener("mouseover", colorear);                      // se aplican a las filas creadas
  tr.addEventListener("mouseout", decolorear);
  tbody.appendChild(tr);
  borrarFormulario();                                              // al final de crear
}

function borrarFormulario() { document.getElementById("formulario").reset(); }

function borrarUltimo() {
  const tbody = document.querySelector("#participantes tbody");
  if (tbody.lastElementChild) tbody.removeChild(tbody.lastElementChild);
}

document.getElementById("btnCrear").addEventListener("click", crear);
document.getElementById("btnBorrar").addEventListener("click", borrarUltimo);
