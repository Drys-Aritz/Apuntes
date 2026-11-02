/* EJERCICIO 5 - WEB STORAGE (2025-26 localStorage / 2024-25 sessionStorage)
   Regla de oro: UNA función "pintarEstado()" que mira el storage y ajusta la pantalla.
   La llamas al cargar y después de guardar/borrar (así se reutiliza el código). */
const form = document.getElementById("formSaioa");
const btnSaioa = document.getElementById("buttonSaioa");
const mezua = document.getElementById("mezua");

function pintarEstado() {
  const usuario = localStorage.getItem("usuario");   // cambia a sessionStorage si piden sesión
  if (usuario) {
    btnSaioa.textContent = "Saioa itxi";
    form.style.display = "none";
    mezua.textContent = `Kaixo, ${usuario}!`;
  } else {
    btnSaioa.textContent = "Saioa hasi";
    form.style.display = "block";
    mezua.textContent = "";
  }
}

form.addEventListener("submit", function (e) {
  e.preventDefault();
  const nombre = document.getElementById("usuario").value.trim();
  if (nombre === "") { alert("El usuario no puede estar vacío"); return; }
  localStorage.setItem("usuario", nombre);
  alert("Usuario guardado en el storage");
  pintarEstado();
});

btnSaioa.addEventListener("click", function () {
  if (localStorage.getItem("usuario")) {             // solo si hay usuario ("Saioa itxi")
    localStorage.removeItem("usuario");
    pintarEstado();
  }
});

pintarEstado();                                      // al cargar la página
/* Versión 2025-26 ("Bienvenido de nuevo, X" + botón Cerrar sesión): es lo mismo,
   cambia solo el texto y que el botón de cerrar sesión se muestra/oculta. */
