
// Ejercicio 1 - Arrays y sintaxis básica

let peliculas = [
  { titulo: "Dune: Parte Dos", director: "Denis Villeneuve", anio: 2025, categoria: "Ciencia Ficción", valoracion: 8.5 },
  { titulo: "Inside Out 2", director: "Kelsey Mann", anio: 2023, categoria: "Animación", valoracion: 7.8 },
  { titulo: "Mufasa: The Lion King", director: "Barry Jenkins", anio: 2024, categoria: "Aventura", valoracion: 8.0 }
];

// FUNCIONES
// - mayúsculas()
function mayusculas() {
  peliculas.forEach(function(pelicula) {
    console.log(pelicula.titulo.toUpperCase());
  });
}

// - peliculasPorCategoria(categoria)
function peliculasPorCategoria(categoria) {
  return peliculas.filter(function(pelicula) {
    return pelicula.categoria.toLowerCase() === categoria.toLowerCase();
  });
}

// - buscarPorTitulo(titulo)
function buscarPorTitulo(titulo) {
  const textoBuscado = titulo.toLowerCase();
  return peliculas.filter(function(pelicula) {
    return pelicula.titulo.toLowerCase().includes(textoBuscado);
  });
}

// - mediaValoraciones()
function mediaValoraciones() {
  const suma = peliculas.reduce(function(total, pelicula) {
    return total + pelicula.valoracion;
  }, 0);

  return suma / peliculas.length;
}

// Ejemplos
console.log("Películas de Ciencia Ficción:", peliculasPorCategoria("Ciencia Ficción"));
console.log("Búsqueda de 'Lion':", buscarPorTitulo("Lion"));
console.log("Media de valoraciones:", mediaValoraciones());
