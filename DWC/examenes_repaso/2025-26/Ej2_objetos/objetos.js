
// Ejercicio 2 - OBJETOS Y CLASES

// Clase Pelicula
// Constructor con: titulo, director, anio, categoria, valoracion
// Método mostrar() -> "Matrix (1999), dirigida por Wachowski, categoría: Ciencia Ficción"
class Pelicula {
    constructor( titulo, director, anio, categoria, valoracion) {
        this.titulo = titulo;
        this.director = director;
        this.anio = anio;
        this.categoria = categoria;
        this.valoracion = valoracion;
    }

    mostrar() {
        return `${this.titulo} (${this.anio}), dirigida por ${this.director}, categoría: ${this.categoria}`;
    }
}


// Crear al menos 2 objetos y meterlos en un array
const pelicula1 = new Pelicula("Matrix", "Wachowski", 1999, "Ciencia Ficción", 8.7);
const pelicula2 = new Pelicula("Titanic", "James Cameron", 1997, "Romance", 7.9);

// Recorrer y mostrar en consola
const listaDeObjetos = [pelicula1, pelicula2];

listaDeObjetos.forEach(function(pelicula) {
  console.log(pelicula.mostrar());
});