
// Ejercicio 2 - OBJETOS Y CLASES

// Clase Pelicula

class Pelicula{
    constructor(titulo, director, anio, categoria, valoracion){
        this.titulo = titulo;
        this.director = director;
        this.anio = anio;
        this.categoria = categoria;
        this.valoracion = valoracion;
    }
    mostrar(){
        return `${this.titulo} (${this.anio}), dirigida por ${this.director}, en la categoría de ${this.categoria}`
    }
}
let pelicula1 = new Pelicula("Dune: Parte Dos","Denis Villeneuve", 2025,"Ciencia Ficción", 8.5 )
let pelicula2 = new Pelicula("Mufasa: The Lion King", "Barry Jenkins", 2024, "Aventura", 8.0)

let peliculas=[pelicula1,pelicula2]

for(let i=0; i<peliculas.length; i++){
    console.log(peliculas[i].mostrar())
}