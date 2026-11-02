// EJERCICIO 3 - DOM Y EVENTOS

// Creamos un array con varias películas.
let peliculas = [
  { titulo: "Matrix" },
  { titulo: "El Padrino" },
  { titulo: "Inception" }
];

// Seleccionamos el botón del HTML mediante su ID.
let boton = document.getElementById("btnMostrar");

// Seleccionamos la lista donde mostraremos las películas.
let lists = document.getElementById("listaPeliculas");

// Escuchamos el evento click del botón.
boton.addEventListener("click", function() {

  // Recorremos todas las películas del array.
  peliculas.forEach(function(pelicula) {

    // Creamos un elemento <li> nuevo.
    let elemento = document.createElement("li");

    // Introducimos el título dentro del elemento.
    elemento.textContent = pelicula.titulo;

    // Añadimos el <li> a la lista del HTML.
    lists.append(elemento);

    // Cuando pasamos el ratón por encima del título...
    elemento.addEventListener("mouseenter", function() {

      // Ponemos el texto en negrita.
      elemento.style.fontWeight = "bold";

    });

    // Cuando quitamos el ratón del título...
    elemento.addEventListener("mouseleave", function() {

      // Quitamos la negrita.
      elemento.style.fontWeight = "normal";

    });

  });

});