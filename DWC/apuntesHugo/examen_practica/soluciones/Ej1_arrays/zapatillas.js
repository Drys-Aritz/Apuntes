// Ejercicio 1 - Arrays de objetos (SOLUCIÓN)

let zapatillas = [
  { nombre: "Air Max 90", marca: "Nike", talla: 42, precio: 120, categoria: "Running" },
  { nombre: "Ultraboost 22", marca: "Adidas", talla: 43, precio: 180, categoria: "Running" },
  { nombre: "Chuck Taylor All Star", marca: "Converse", talla: 41, precio: 60, categoria: "Casual" },
  { nombre: "Jordan 1", marca: "Nike", talla: 44, precio: 170, categoria: "Baloncesto" },
  { nombre: "Gazelle", marca: "Adidas", talla: 40, precio: 90, categoria: "Casual" }
];

function mayusculas() {
  for (let i = 0; i < zapatillas.length; i++) {
    console.log(zapatillas[i].nombre.toUpperCase());
  }
}

function zapatillasPorCategoria(categoria) {
  let resultado = [];
  for (let i = 0; i < zapatillas.length; i++) {
    if (zapatillas[i].categoria === categoria) {
      resultado.push(zapatillas[i]);
    }
  }
  return resultado;
}

function buscarPorNombre(texto) {
  let resultado = [];
  for (let i = 0; i < zapatillas.length; i++) {
    if (zapatillas[i].nombre.toLowerCase().includes(texto.toLowerCase())) {
      resultado.push(zapatillas[i]);
    }
  }
  return resultado;
}

function mediaPrecios() {
  let suma = 0;
  for (let i = 0; i < zapatillas.length; i++) {
    suma += zapatillas[i].precio;
  }
  return suma / zapatillas.length;
}

// Pruebas (puedes ejecutar con node zapatillas.js):
// mayusculas();
// console.log(zapatillasPorCategoria("Running"));
// console.log(buscarPorNombre("max"));
// console.log(mediaPrecios());
