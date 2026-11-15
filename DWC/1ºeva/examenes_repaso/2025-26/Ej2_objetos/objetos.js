// EJERCICIO 2 - OBJETOS Y CLASES

// Creamos una clase llamada Pelicula.
// La clase sirve como plantilla para crear objetos.
class Pelicula {

  // El constructor recibe los datos necesarios para crear cada película.
  constructor(titulo, director, anio, categoria, valoracion) {

    // Guardamos cada parámetro como propiedad del objeto.
    this.titulo = titulo;
    this.director = director;
    this.anio = anio;
    this.categoria = categoria;
    this.valoracion = valoracion;

  }

  // Creamos un método que devuelve información de la película.
  mostrar() {

    // Utilizamos una plantilla de texto con ${} para introducir propiedades.
    return `${this.titulo} (${this.anio}), dirigida por ${this.director}, categoría: ${this.categoria}`;

  }
}

// Creamos dos objetos utilizando la clase Pelicula.
// new crea una nueva instancia de la clase.
const pelicula1 = new Pelicula("Matrix", "Wachowski", 1999, "Ciencia Ficción", 8.7);

const pelicula2 = new Pelicula("Titanic", "James Cameron", 1997, "Romance", 7.9);

// Guardamos los dos objetos en un array.
const listaDeObjetos = [pelicula1, pelicula2];

// Recorremos el array.
listaDeObjetos.forEach(function(pelicula) {

  // Llamamos al método mostrar() de cada objeto.
  console.log(pelicula.mostrar());

});