
// Ejercicio 3 - DOM y eventos

let peliculas = [
  { titulo: "Matrix" },
  { titulo: "El Padrino" },
  { titulo: "Inception" }
];
const boton =document.getElementById("btnMostrar")
  // Al pulsar el botón debes recorrer el array y mostrar cada título como <li>
boton.addEventListener("click", function() {
  let ul = document.getElementById("listaPeliculas");
  // Vacío la lista para que no se dupliquen los <li> si se pulsa varias veces
  while (ul.firstChild) ul.removeChild(ul.firstChild);
  for (let i = 0; i < peliculas.length; i++) {
    let li = document.createElement("li");
    li.textContent = peliculas[i].titulo;
    ul.appendChild(li);
  }});
  // Al pasar el ratón por encima de un elemento de la lista, pone el texto de esa pelicula en negrita, cuando sales, se vuelve a poner normal

const lista = document.getElementById("listaPeliculas");
lista.addEventListener("mouseover", function (e) {
  if (e.target.tagName === "LI") {
    e.target.style.fontWeight = "bold";
  }
});
lista.addEventListener("mouseout", function (e) {
  if (e.target.tagName === "LI") {
    e.target.style.fontWeight = "normal";
  }
});