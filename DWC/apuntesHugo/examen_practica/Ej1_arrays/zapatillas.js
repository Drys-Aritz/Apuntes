// Ejercicio 1 - Arrays de objetos (zapatillas deportivas)
// Array inicial: NO lo modifiques. Úsalo en las funciones de abajo.

let zapatillas = [
  { nombre: "Air Max 90", marca: "Nike", talla: 42, precio: 120, categoria: "Running" },
  { nombre: "Ultraboost 22", marca: "Adidas", talla: 43, precio: 180, categoria: "Running" },
  { nombre: "Chuck Taylor All Star", marca: "Converse", talla: 41, precio: 60, categoria: "Casual" },
  { nombre: "Jordan 1", marca: "Nike", talla: 44, precio: 170, categoria: "Baloncesto" },
  { nombre: "Gazelle", marca: "Adidas", talla: 40, precio: 90, categoria: "Casual" }
];

// -----------------------------------------------------------------------------
// 1. Muestra por consola todos los nombres de las zapatillas en mayúsculas.
//    (No devuelve nada, solo imprime.)
// -----------------------------------------------------------------------------
function mayusculas() {
  for(let i = 0; i<zapatillas.length; i++){
    nombre=zapatillas[i].nombre.toUpperCase();
    console.log(nombre);
  }
}

// -----------------------------------------------------------------------------
// 2. Devuelve un nuevo array solo con las zapatillas de la categoría indicada.
// -----------------------------------------------------------------------------
function zapatillasPorCategoria(categoria) {
 let output=[];
 for(let i = 0; i<zapatillas.length; i++){
  if (zapatillas[i].categoria==categoria){
    output.push(zapatillas[i])
  }
 }
  return output;
}

// -----------------------------------------------------------------------------
// 3. Devuelve todas las zapatillas cuyo nombre contenga el texto indicado
//    (sin distinguir mayúsculas/minúsculas).
// -----------------------------------------------------------------------------
function buscarPorNombre(texto) {
let output=[];
 for(let i = 0; i<zapatillas.length; i++){
  let nombre=zapatillas[i].nombre.toLowerCase()
  if (nombre.includes(texto.toLowerCase())){
    output.push(zapatillas[i])
  }
 }
  return output;
}


// -----------------------------------------------------------------------------
// 4. Devuelve la media de los precios de todas las zapatillas.
// -----------------------------------------------------------------------------
function mediaPrecios() {
  let total=0;
  for(let i = 0; i<zapatillas.length; i++){
    total+=zapatillas[i].precio;
  }
  total=total / zapatillas.length;
  return total;
}

// Ejemplo de uso para probar (puedes descomentar):
// mayusculas();
// console.log(zapatillasPorCategoria("Running"));
// console.log(buscarPorNombre("max"));
// console.log(mediaPrecios());
