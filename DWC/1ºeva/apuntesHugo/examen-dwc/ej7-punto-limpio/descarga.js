/* 1. CLASES (descarga.js) - getters/setters estándar */
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
  mostrar() {
    return `${this._nombre} ha depositado ${this._kg} kg del residuo ${this._residuo} en el contenedor ${this._color}`;
  }
}
