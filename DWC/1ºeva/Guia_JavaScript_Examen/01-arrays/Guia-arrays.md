# 1. Arrays: alternativas y patrones

Un array guarda varios elementos. En estos ejercicios cada elemento suele ser un objeto.

## Datos de ejemplo

```js
const productos = [
  { nombre: "Teclado", precio: 35, stock: 4, categoria: "Informática" },
  { nombre: "Taza", precio: 8, stock: 12, categoria: "Hogar" },
  { nombre: "Ratón", precio: 18, stock: 0, categoria: "Informática" },
  { nombre: "Lámpara", precio: 24, stock: 3, categoria: "Hogar" }
];
```

## A. `forEach`: hacer algo con cada elemento

```js
function mostrarProductos() {
  productos.forEach(function(producto) {
    console.log(producto.nombre);
  });
}
```

`forEach` recorre el array. No crea un array nuevo ni devuelve automáticamente los elementos.

## B. `filter`: obtener varios que cumplen

```js
function productosBaratos() {
  return productos.filter(function(producto) {
    return producto.precio < 20;
  });
}
```

Devuelve un array nuevo. Si no hay coincidencias, devuelve `[]`.

## C. `find`: obtener el primero que coincide

```js
function buscarProducto(nombreBuscado) {
  return productos.find(function(producto) {
    return producto.nombre.toLowerCase() === nombreBuscado.toLowerCase();
  });
}
```

Devuelve un objeto o `undefined` si no encuentra ninguno.

## D. `map`: transformar todos los elementos

```js
function obtenerNombres() {
  return productos.map(function(producto) {
    return producto.nombre;
  });
}
```

Devuelve un array nuevo con los resultados de la transformación.

## E. `reduce`: calcular un acumulado

```js
function calcularValorInventario() {
  return productos.reduce(function(total, producto) {
    return total + producto.precio * producto.stock;
  }, 0);
}
```

El `0` es el valor inicial del acumulador.

## F. `some` y `every`

```js
// ¿Hay algún producto sin stock?
const hayAgotados = productos.some(function(producto) {
  return producto.stock === 0;
});

// ¿Todos tienen un precio positivo?
const preciosCorrectos = productos.every(function(producto) {
  return producto.precio > 0;
});
```

- `some`: basta con que uno cumpla.
- `every`: tienen que cumplir todos.

## G. Ordenar un array

```js
// Ordenar de menor a mayor precio.
// sort modifica el array original.
productos.sort(function(a, b) {
  return a.precio - b.precio;
});

// Para ordenar de mayor a menor:
// productos.sort((a, b) => b.precio - a.precio);
```

## H. Contar coincidencias

```js
function contarProductosDeCategoria(categoria) {
  return productos.filter(function(producto) {
    return producto.categoria === categoria;
  }).length;
}
```

## I. Comprobar si un elemento existe

```js
const existeTeclado = productos.some(function(producto) {
  return producto.nombre === "Teclado";
});
```

## Diferencias que suelen preguntar

| Método | Devuelve | Para qué |
|---|---|---|
| `forEach` | `undefined` | Recorrer y ejecutar acciones |
| `filter` | Array | Todos los que cumplen |
| `find` | Elemento o `undefined` | Primer elemento coincidente |
| `map` | Array | Transformar elementos |
| `reduce` | Un acumulado | Sumar, contar o agrupar |
| `some` | Booleano | Al menos uno cumple |
| `every` | Booleano | Todos cumplen |
| `sort` | Array ordenado | Ordenar; modifica el original |

## Ejercicios para practicar

1. Devuelve los productos cuyo stock sea mayor que cero.
2. Busca el producto llamado `Taza`.
3. Crea un array con los nombres en mayúsculas.
4. Calcula cuánto vale todo el inventario (`precio * stock`).
5. Comprueba si hay algún producto de más de 30 euros.
6. Ordena los productos de mayor a menor precio.
7. Cuenta cuántos productos pertenecen a la categoría `Hogar`.
