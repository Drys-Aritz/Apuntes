/* EJERCICIO 2 - OBJETOS (todos los años)
   Getters/setters ESTÁNDAR: get nombre() / set nombre(valor)  (nada de getNombre())
   Atributo "privado" por convención: this._nombre
*/

/* ---------- Pelicula (2025-26) ---------- */
class Pelicula {
  constructor(titulo, director, anio, categoria, valoracion) {
    this._titulo = titulo;
    this._director = director;
    this._anio = anio;
    this._categoria = categoria;
    this._valoracion = valoracion;
  }
  get titulo() { return this._titulo; }
  set titulo(valor) { this._titulo = valor; }
  get director() { return this._director; }
  set director(valor) { this._director = valor; }
  get anio() { return this._anio; }
  set anio(valor) { this._anio = valor; }
  get categoria() { return this._categoria; }
  set categoria(valor) { this._categoria = valor; }
  get valoracion() { return this._valoracion; }
  set valoracion(valor) { this._valoracion = valor; }

  // DEVUELVE la cadena (no console.log dentro)
  mostrar() {
    return `${this._titulo} (${this._anio}), dirigida por ${this._director}, en la categoría de ${this._categoria}`;
  }
}

const lista = [
  new Pelicula("Matrix", "Wachowski", 1999, "Ciencia Ficción", 8.7),
  new Pelicula("Dune", "Villeneuve", 2021, "Ciencia Ficción", 8.0)
];
lista.forEach(p => console.log(p.mostrar()));

/* ---------- Cuenta (2022-23) ----------
   - titular obligatorio, cantidad opcional (por defecto 0)
   - cantidad NO se puede modificar directamente: sin setter, solo ingresar/retirar
   - no se puede quedar en números rojos */
class Cuenta {
  constructor(titular = "", cantidad = 0) {
    this._titular = titular;
    this._cantidad = cantidad > 0 ? cantidad : 0;
  }
  get titular() { return this._titular; }
  set titular(valor) { this._titular = valor; }
  get cantidad() { return this._cantidad; }          // SIN set cantidad

  mostrar() { return `Titular: ${this._titular} - Cantidad: ${this._cantidad.toFixed(2)} €`; }

  ingresar(c) { if (c > 0) this._cantidad += c; }    // negativo: no hace nada
  retirar(c) { if (c > 0 && this._cantidad - c >= 0) this._cantidad -= c; }
}

const cuentas = [new Cuenta("Ane", 100), new Cuenta("Jon")];
cuentas[0].ingresar(50);
cuentas[0].retirar(500);   // no hace nada: quedaría en rojos
cuentas[1].ingresar(-20);  // no hace nada
cuentas[1].ingresar(30.5);
cuentas.forEach(c => console.log(c.mostrar()));

/* ---------- Descarga (2023-24) ---------- */
class Descarga {
  constructor(color, residuo, kg, nombre) {
    this._color = color; this._residuo = residuo; this._kg = kg; this._nombre = nombre;
  }
  get color() { return this._color; }
  set color(v) { this._color = v; }
  get residuo() { return this._residuo; }
  set residuo(v) { this._residuo = v; }
  get kg() { return this._kg; }
  set kg(v) { this._kg = v; }
  get nombre() { return this._nombre; }
  set nombre(v) { this._nombre = v; }
  mostrar() { return `${this._nombre} ha depositado ${this._kg} kg del residuo ${this._residuo} en el contenedor ${this._color}`; }
}
