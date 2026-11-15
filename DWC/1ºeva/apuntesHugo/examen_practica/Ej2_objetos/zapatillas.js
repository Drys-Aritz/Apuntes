// Ejercicio 2 - Objetos y clases (zapatillas deportivas)

// -----------------------------------------------------------------------------
// 1. Crea la clase Zapatilla con las propiedades:
//    nombre, marca, talla, precio, categoria
// -----------------------------------------------------------------------------
class Zapatilla {
  constructor(nombre, marca, talla, precio, categoria) {
    this.nombre=nombre
    this.marca=marca
    this.talla=talla
    this.precio=precio
    this.categoria=categoria
  }



  // -----------------------------------------------------------------------------
  // 2. Implementa el método mostrar() que devuelva una cadena con este formato:
  //    "Air Max 90 (Nike), talla 42, precio 120 €, categoría Running"
  // -----------------------------------------------------------------------------
  mostrar() {
    // TODO: devuelve la cadena con el formato exacto
    return this.nombre + " ("+ this.marca + "), talla " + this.talla + ", precio " + this.precio + " €, categoría " + this.categoria;
  }
}

// -----------------------------------------------------------------------------
// 3. Crea dos objetos de la clase Zapatilla, guárdalos en un array y recórrelo
//    mostrando el resultado de mostrar() por consola.
// -----------------------------------------------------------------------------
let zapatilla1 = new Zapatilla("Air Max 90", "Nike", 42, 120, "Running" );
let zapatilla2 = new Zapatilla("Ultraboost 22", "Adidas", 43, 180, "Running" );

let coleccion = [zapatilla1,zapatilla2];

for(let i=0; i<coleccion.length; i++){
  console.log(coleccion[i].mostrar());
}

