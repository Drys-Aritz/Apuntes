// Ejercicio 5 - Web Storage (SOLUCIÓN)

const form = document.getElementById("formUsuario");
const bienvenida = document.getElementById("bienvenida");
const cerrar = document.getElementById("cerrarSesion");

function pintar() {
  const usuario = localStorage.getItem("usuario");

  if (usuario) {
    form.style.display = "none";
    bienvenida.textContent = "Bienvenido de nuevo, " + usuario;
    cerrar.hidden = false;
  } else {
    form.style.display = "block";
    bienvenida.textContent = "";
    cerrar.hidden = true;
  }
}

form.addEventListener("submit", function (e) {
  e.preventDefault(); // no recargar la página
  const usuario = document.getElementById("nombreUsuario").value.trim();

  if (usuario !== "") {
    localStorage.setItem("usuario", usuario);
    document.getElementById("nombreUsuario").value = "";
    pintar();
  }
});

cerrar.addEventListener("click", function () {
  localStorage.removeItem("usuario");
  pintar();
});

// Estado inicial al cargar
pintar();
