// EJERCICIO 1 - ARRAYS Y SINTAXIS BÁSICA

// Creamos un array que contiene varios objetos.
// Cada objeto representa una película y tiene sus propiedades.
let peliculas = [
  { titulo: "Dune: Parte Dos", director: "Denis Villeneuve", anio: 2025, categoria: "Ciencia Ficción", valoracion: 8.5 },
  { titulo: "Inside Out 2", director: "Kelsey Mann", anio: 2023, categoria: "Animación", valoracion: 7.8 },
  { titulo: "Mufasa: The Lion King", director: "Barry Jenkins", anio: 2024, categoria: "Aventura", valoracion: 8.0 }
];

// FUNCIÓN 1: Mostrar los títulos en mayúsculas.
function mayusculas() {

  // forEach recorre todos los elementos del array.
  peliculas.forEach(function(pelicula) {

    // toUpperCase() convierte el título a mayúsculas.
    // console.log() lo muestra por consola.
    console.log(pelicula.titulo.toUpperCase());

  });
}

// FUNCIÓN 2: Buscar películas por categoría.
function peliculasPorCategoria(categoria) {

  // filter crea un nuevo array con los elementos que cumplen la condición.
  return peliculas.filter(function(pelicula) {

    // Comparamos las categorías sin distinguir mayúsculas y minúsculas.
    return pelicula.categoria.toLowerCase() === categoria.toLowerCase();

  });
}

// FUNCIÓN 3: Buscar películas por una parte del título.
function buscarPorTitulo(titulo) {

  // Convertimos el texto buscado a minúsculas.
  const textoBuscado = titulo.toLowerCase();

  // filter devuelve las películas cuyo título contiene ese texto.
  return peliculas.filter(function(pelicula) {

    // includes comprueba si el título contiene el texto buscado.
    return pelicula.titulo.toLowerCase().includes(textoBuscado);

  });
}

// FUNCIÓN 4: Calcular la media de las valoraciones.
function mediaValoraciones() {

  // reduce suma todas las valoraciones.
  // total acumula la suma y empieza en 0.
  const suma = peliculas.reduce(function(total, pelicula) {

    return total + pelicula.valoracion;

  }, 0);

  // Dividimos la suma entre el número de películas.
  return suma / peliculas.length;
}

// EJEMPLOS DE USO DE LAS FUNCIONES.

// Mostramos las películas de una categoría.
console.log(peliculasPorCategoria("Ciencia Ficción"));

// Buscamos películas que contengan la palabra "Lion".
console.log(buscarPorTitulo("Lion"));

// Mostramos la media de valoraciones.
console.log(mediaValoraciones());