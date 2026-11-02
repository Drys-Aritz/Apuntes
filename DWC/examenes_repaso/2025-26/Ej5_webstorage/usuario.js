// EJERCICIO 5 - WEB STORAGE

// Seleccionamos el formulario y la zona donde mostraremos la bienvenida.
const formularioLogin = document.getElementById("formUsuario");
const zonaBienvenida = document.getElementById("mensaje");

// Comprobamos si ya existe un usuario guardado al abrir la página.
mostrarEstadoUsuario();

// Escuchamos el envío del formulario.
formularioLogin.addEventListener("submit", function(evento) {

  // Evitamos que la página se recargue.
  evento.preventDefault();

  // Obtenemos el nombre escrito y eliminamos espacios sobrantes.
  const nombre = document.getElementById("nombreUsuario").value.trim();

  // Comprobamos que el nombre no esté vacío.
  if (nombre !== "") {

    // Guardamos el nombre en localStorage.
    // "usuario" es la clave y nombre es el valor.
    localStorage.setItem("usuario", nombre);

    // Actualizamos lo que se muestra en pantalla.
    mostrarEstadoUsuario();

  }

});

// Función que comprueba si hay un usuario guardado.
function mostrarEstadoUsuario() {

  // Recuperamos el nombre almacenado.
  const usuarioGuardado = localStorage.getItem("usuario");

  // Si existe un usuario...
  if (usuarioGuardado !== null) {

    // Ocultamos el formulario.
    formularioLogin.style.display = "none";

    // Limpiamos el contenido anterior.
    zonaBienvenida.replaceChildren();

    // Creamos el mensaje de bienvenida.
    const textoBienvenida = document.createElement("p");
    textoBienvenida.textContent = "Bienvenido de nuevo, " + usuarioGuardado;

    // Creamos el botón de cerrar sesión.
    const botonCerrar = document.createElement("button");
    botonCerrar.textContent = "Cerrar sesión";
    botonCerrar.type = "button";

    // Escuchamos el clic del botón.
    botonCerrar.addEventListener("click", function() {

      // Eliminamos el usuario guardado.
      localStorage.removeItem("usuario");

      // Limpiamos el formulario.
      formularioLogin.reset();

      // Volvemos a mostrar el formulario.
      formularioLogin.style.display = "block";

      // Borramos el mensaje y el botón.
      zonaBienvenida.replaceChildren();

    });

    // Añadimos el mensaje y el botón al HTML.
    zonaBienvenida.appendChild(textoBienvenida);
    zonaBienvenida.appendChild(botonCerrar);

  } else {

    // Si no hay usuario guardado, mostramos el formulario.
    formularioLogin.style.display = "block";

    // Limpiamos la zona de bienvenida.
    zonaBienvenida.replaceChildren();

  }

}