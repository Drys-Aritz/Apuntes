// Ejercicio 2 - Objetos y clases (SOLUCIÓN)

class Zapatilla {
  constructor(nombre, marca, talla, precio, categoria) {
    this.nombre = nombre;
    this.marca = marca;
    this.talla = talla;
    this.precio = precio;
    this.categoria = categoria;
  }

  mostrar() {
    return `${this.nombre} (${this.marca}), talla ${this.talla}, precio ${this.precio} €, categoría de ${this.categoria}`;
  }
}

let zapatilla1 = new Zapatilla("Air Max 90", "Nike", 42, 120, "Running");
let zapatilla2 = new Zapatilla("Ultraboost 22", "Adidas", 43, 180, "Running");

let coleccion = [zapatilla1, zapatilla2];

for (let i = 0; i < coleccion.length; i++) {
  console.log(coleccion[i].mostrar());
}
