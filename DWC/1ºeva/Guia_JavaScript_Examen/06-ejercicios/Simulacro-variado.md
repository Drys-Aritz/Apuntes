# Simulacro variado de examen

Intenta resolver cada ejercicio antes de mirar las pistas. No hace falta hacerlos todos seguidos.

## Ejercicio 1 — Arrays

Tenemos:

```js
const libros = [
  { titulo: "Libro A", precio: 12, paginas: 100 },
  { titulo: "Libro B", precio: 25, paginas: 300 },
  { titulo: "Libro C", precio: 8, paginas: 80 },
  { titulo: "Libro D", precio: 18, paginas: 200 }
];
```

1. Devuelve los libros que cuesten menos de 20 euros.
2. Busca el libro cuyo título sea `Libro B`.
3. Crea un array con los títulos.
4. Calcula la suma de todas las páginas.
5. Comprueba si algún libro tiene más de 250 páginas.

Pistas: `filter`, `find`, `map`, `reduce`, `some`.

## Ejercicio 2 — Clases

Crea una clase `CuentaBancaria` con titular y saldo.

1. El constructor recibe ambos datos.
2. Crea un método `ingresar(cantidad)` que sume dinero si la cantidad es positiva.
3. Crea un método `consultarSaldo()` que devuelva el saldo.
4. Crea una cuenta y prueba los métodos.

Pista: modifica `this.saldo`.

## Ejercicio 3 — DOM

HTML necesario:

```html
<button id="cambiar">Cambiar mensaje</button>
<p id="texto">Mensaje inicial</p>
```

Al pulsar el botón, cambia el texto del párrafo y ponlo en azul.

Pista: `getElementById`, `addEventListener`, `textContent`, `style.color`.

## Ejercicio 4 — Formulario

Crea un formulario para introducir una edad.

1. Evita que se envíe y recargue la página.
2. Comprueba que no esté vacío.
3. Comprueba que sea un número entre 1 y 120.
4. Muestra el error en rojo o el éxito en verde.

Pista: `Number()`, `!== ""`, `&&`.

## Ejercicio 5 — Web Storage

Guarda el nombre de una ciudad favorita.

1. Al pulsar Guardar, almacena la ciudad.
2. Al cargar la página, si hay una ciudad guardada, muéstrala.
3. Añade un botón para borrar la ciudad guardada.

Pista: `setItem`, `getItem`, `removeItem`.

## Ejercicio 6 — Arrays + DOM

Dado un array de tareas, muestra cada tarea como un elemento `li`. Añade un botón junto a cada tarea para eliminarla de la página.

Pistas: `forEach`, `createElement`, `append`, `remove`.

## Ejercicio 7 — Clases + arrays

Crea una clase `Producto` con nombre y precio. Crea tres productos, guárdalos en un array y muestra por consola los productos cuyo precio sea superior a 10 euros.

Pistas: `class`, `constructor`, `new`, `filter`, `forEach`.

## Ejercicio 8 — Formulario + regex

Crea un formulario que pida un código postal de cinco cifras. Valida que tenga exactamente cinco dígitos.

Pista: `/^\d{5}$/`.

## Ejercicio 9 — Web Storage + JSON

Guarda un objeto con nombre y edad en `localStorage`. Después recupéralo y muestra el nombre.

Pistas: `JSON.stringify`, `JSON.parse`.

## Ejercicio 10 — DOM + input

Crea un buscador que muestre en un párrafo el texto que el usuario va escribiendo.

Pista: evento `input`.

---

# Pistas de resolución

- Si te piden varios resultados, piensa en `filter`.
- Si te piden el primero, piensa en `find`.
- Si te piden una lista de una sola propiedad, piensa en `map`.
- Si te piden una suma, piensa en `reduce`.
- Si el resultado debe cambiar al pulsar, utiliza un evento.
- Si el dato debe seguir guardado al volver a abrir, utiliza `localStorage`.
- Si guardas un objeto o array, utiliza JSON.
