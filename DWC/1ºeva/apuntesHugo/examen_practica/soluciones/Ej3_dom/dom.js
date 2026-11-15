// Ejercicio 3 - DOM y Eventos (SOLUCIÓN)

let zapatillas = [
  { nombre: "Air Max 90" },
  { nombre: "Ultraboost 22" },
  { nombre: "Chuck Taylor All Star" },
  { nombre: "Jordan 1" },
  { nombre: "Gazelle" }
];

const boton = document.getElementById("btnMostrar");
const ul = document.getElementById("listaZapatillas");

boton.addEventListener("click", function () {
  // Vacía la lista para no duplicar si se pulsa varias veces
  while (ul.firstChild) {
    ul.removeChild(ul.firstChild);
  }

  for (let i = 0; i < zapatillas.length; i++) {
    let li = document.createElement("li");
    li.textContent = zapatillas[i].nombre;

    // Efecto hover: negrita al entrar, normal al salir
    li.addEventListener("mouseover", function () {
      li.style.fontWeight = "bold";
    });

    li.addEventListener("mouseout", function () {
      li.style.fontWeight = "normal";
    });

    ul.appendChild(li);
  }
});
