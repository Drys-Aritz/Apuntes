# Chuleta rápida de JavaScript

## Arrays

```js
// Recorrer todos los elementos
productos.forEach(function(producto) {
  console.log(producto.nombre);
});

// Filtrar varios elementos
let baratos = productos.filter(function(producto) {
  return producto.precio < 20;
});

// Buscar el primer elemento coincidente
let encontrado = productos.find(function(producto) {
  return producto.nombre === "Ratón";
});

// Crear un array transformado
let nombres = productos.map(function(producto) {
  return producto.nombre;
});

// Acumular o sumar
let total = productos.reduce(function(acumulado, producto) {
  return acumulado + producto.precio;
}, 0);

// Comprobar todos / alguno
let todosDisponibles = productos.every(p => p.disponible);
let algunoCaro = productos.some(p => p.precio > 100);
```

## Clases

```js
class Persona {
  constructor(nombre, edad) {
    this.nombre = nombre;
    this.edad = edad;
  }

  presentarse() {
    return `Soy ${this.nombre} y tengo ${this.edad} años`;
  }
}

const persona1 = new Persona("Ane", 20);
console.log(persona1.presentarse());
```

## DOM y eventos

```js
const boton = document.getElementById("miBoton");
const salida = document.getElementById("resultado");

boton.addEventListener("click", function() {
  salida.textContent = "Has pulsado el botón";
});
```

## Formularios

```js
const formulario = document.getElementById("miFormulario");

formulario.addEventListener("submit", function(event) {
  event.preventDefault();

  const valor = document.getElementById("campo").value.trim();
  const mensaje = document.getElementById("mensaje");

  if (valor === "") {
    mensaje.textContent = "El campo es obligatorio";
    mensaje.style.color = "red";
  } else {
    mensaje.textContent = "Correcto";
    mensaje.style.color = "green";
  }
});
```

## Web Storage

```js
// Guardar
localStorage.setItem("clave", "valor");

// Leer
const valor = localStorage.getItem("clave");

// Comprobar si no existe
if (valor === null) {
  console.log("No hay ningún dato guardado");
}

// Eliminar una clave
localStorage.removeItem("clave");
```

## Operadores y propiedades útiles

| Código | Significado |
|---|---|
| `===` | Igualdad estricta |
| `!==` | Distinto estricto |
| `&&` | Y: todas las condiciones |
| `||` | O: al menos una condición |
| `!` | Negación |
| `++` / `--` | Sumar/restar uno |
| `.length` | Longitud de texto o tamaño de array |
| `.value` | Valor de un input o select |
| `.trim()` | Quita espacios de los extremos |
| `Number(x)` | Convierte a número |
| `.includes(x)` | Comprueba si contiene |
| `.toLowerCase()` | Pasa a minúsculas |
| `.toUpperCase()` | Pasa a mayúsculas |
