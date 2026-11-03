// EJERCICIO 4 - VALIDACIÓN DE FORMULARIO

// Seleccionamos el formulario.
let formulario = document.getElementById("formPelicula");

// Escuchamos el evento submit, que se produce al enviar el formulario.
formulario.addEventListener("submit", function(event) {

  // Evitamos que la página se recargue al enviar el formulario.
  event.preventDefault();

  // Seleccionamos los campos del HTML.
  let titulo = document.getElementById("titulo");
  //let titulo = document.getElementById("titulo").value; es lo mismo pero resume la linea siguente
  let director = document.getElementById("director");
  let anio = document.getElementById("anio");
  let categoria = document.getElementById("categoria");
  let mensaje = document.getElementById("mensaje");

  // Limpiamos los mensajes anteriores.
  mensaje.textContent = "";

  // Permitimos que los saltos de línea \n se vean en pantalla.
  mensaje.style.whiteSpace = "pre-line";

  // Obtenemos los valores escritos por el usuario.
  let valorTitulo = titulo.value;
  let valorDirector = director.value;
  let valorAnio = anio.value;
  let valorCategoria = categoria.value;

  // Comprobamos que título y director tengan entre 3 y 50 letras.
  let regexTexto = /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]{3,50}$/;

  // test() devuelve true si el texto cumple la expresión regular.
  let tituloValido = regexTexto.test(valorTitulo);
  let directorValido = regexTexto.test(valorDirector);

  // Comprobamos que el año tenga cuatro cifras y esté entre 1900 y 2099.
  let regexAnio = /^(19|20)\d{2}$/;
  let anioValido = regexAnio.test(valorAnio);

  // Comprobamos que se haya seleccionado una categoría.
  let categoriaValida = valorCategoria !== "";

  // Si TODAS las condiciones son verdaderas...
  if (tituloValido && directorValido && anioValido && categoriaValida) {

    // Mostramos el mensaje de éxito en verde.
    mensaje.textContent = "Película validada correctamente";
    mensaje.style.color = "green";

  } else {

    // Si hay algún error, ponemos el texto en rojo.
    mensaje.style.color = "red";

    // Comprobamos cada campo de forma independiente.
    // Así podemos mostrar varios errores a la vez.

    if (!tituloValido) {
      mensaje.textContent += "El título debe tener entre 3 y 50 caracteres alfabéticos.\n";
    }

    if (!directorValido) {
      mensaje.textContent += "El director debe tener entre 3 y 50 caracteres alfabéticos.\n";
    }

    if (!anioValido) {
      mensaje.textContent += "El año debe ser un número de 4 dígitos entre 1900 y 2099.\n";
    }

    if (!categoriaValida) {
      mensaje.textContent += "Debes seleccionar una categoría.\n";
    }

  }

});
