
// Ejercicio 3 - DOM y eventos

let peliculas = [
  { titulo: "Matrix" },
  { titulo: "El Padrino" },
  { titulo: "Inception" }
];

let boton = document.getElementById("btnMostrar");
let lists = document.getElementById("listaPeliculas");


// Al pulsar el botón debes recorrer el array y mostrar cada título como <li>
boton.addEventListener("click", function () {

  peliculas.forEach(function (pelicula) {
    let elemento = document.createElement("li");
    elemento.textContent = pelicula.titulo;
    lists.append(elemento);

    
    // Al pasar el ratón por encima, pone el texto en negrita
    elemento.addEventListener("mouseenter", function () {
      elemento.style.fontWeight = "bold";
    });

    elemento.addEventListener("mouseleave", function () {
      elemento.style.fontWeight = "normal";
    });

  });
});