// Ejercicio 3 - DOM y Eventos
// Array de zapatillas (ya disponible, no lo modifiques)

let zapatillas = [
  { nombre: "Air Max 90" },
  { nombre: "Ultraboost 22" },
  { nombre: "Chuck Taylor All Star" },
  { nombre: "Jordan 1" },
  { nombre: "Gazelle" }
];

// -----------------------------------------------------------------------------
// 1. Asocia al botón un evento que, al pulsarlo, recorra el array y muestre
//    cada nombre como un <li> dentro de la lista #listaZapatillas.
//    Usa createElement, appendChild y textContent (sin innerHTML).
// -----------------------------------------------------------------------------
const boton = document.getElementById("btnMostrar");

boton.addEventListener("click" , function (){
  let ul = document.getElementById("listaZapatillas")
  while (ul.firstChild)ul.removeChild(ul.firstChild)
    for (let i = 0; i < zapatillas.length; i++) {
    let li = document.createElement("li");
    li.textContent = zapatillas[i].nombre;
    ul.appendChild(li);
  }});

// -----------------------------------------------------------------------------
// 2. Añade el efecto: al pasar el ratón sobre un <li>, negrita.
//    Al salir, vuelve al estilo normal.
//    (Puedes poner los listeners dentro del bucle del click o usar delegación.)
// -----------------------------------------------------------------------------

const lista = document.getElementById("listaZapatillas");
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