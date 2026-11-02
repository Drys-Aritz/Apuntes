
// Ejercicio 1 - Arrays y sintaxis básica

let peliculas = [
  { titulo: "Dune: Parte Dos", director: "Denis Villeneuve", anio: 2025, categoria: "Ciencia Ficción", valoracion: 8.5 },
  { titulo: "Inside Out 2", director: "Kelsey Mann", anio: 2023, categoria: "Animación", valoracion: 7.8 },
  { titulo: "Mufasa: The Lion King", director: "Barry Jenkins", anio: 2024, categoria: "Aventura", valoracion: 8.0 }
];

// 1. Muestra por consola todos los títulos en mayúsculas
function mayusculas() {
  for (let i = 0; i < peliculas.length; i++) {
    console.log(peliculas[i].titulo.toUpperCase());
  }
}

// 2. Devuelve un nuevo array con las películas de esa categoría
function peliculasPorCategoria(categoria) {
  let resultado = [];
  for (let i = 0; i < peliculas.length; i++) {
    if (peliculas[i].categoria === categoria) {
      resultado.push(peliculas[i]);
    }
  }
  return resultado; // [] si no hay ninguna
}

// 3. Devuelve las películas cuyo título contiene el texto (sin distinguir mayúsculas)
function buscarPorTitulo(texto) {
  let resultado = [];
  for (let i = 0; i < peliculas.length; i++) {
    if (peliculas[i].titulo.toLowerCase().includes(texto.toLowerCase())) {
      resultado.push(peliculas[i]); // la película, no el título
    }
  }
  return resultado;
}

// 4. Devuelve la media de las valoraciones
function mediaValoraciones() {
  let suma = 0;
  for (let i = 0; i < peliculas.length; i++) {
    suma += peliculas[i].valoracion;
  }
  return suma / peliculas.length;
}

// Pruebas: el console.log va FUERA de las funciones, para no restar puntos
mayusculas();
console.log(peliculasPorCategoria("Animación"));
console.log(buscarPorTitulo("lion"));
console.log(mediaValoraciones());
