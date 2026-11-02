# Mapa de estudio

## Los cinco bloques principales

| Bloque | Qué tienes que saber hacer |
|---|---|
| Arrays | Recorrer, filtrar, buscar, transformar y sumar datos |
| Clases y objetos | Crear plantillas, instancias, propiedades y métodos |
| DOM y eventos | Seleccionar elementos, escuchar eventos y modificar la página |
| Formularios | Leer valores, validar datos y mostrar errores |
| Web Storage | Guardar, recuperar y borrar datos en el navegador |

## Cómo interpretar un enunciado

- «Recorre todos...» → normalmente `forEach()`.
- «Devuelve los que cumplen...» → normalmente `filter()`.
- «Encuentra el primero...» → normalmente `find()`.
- «Obtén un array con...» → normalmente `map()`.
- «Calcula el total/la media...» → normalmente `reduce()`.
- «Comprueba si todos...» → `every()`.
- «Comprueba si alguno...» → `some()`.
- «Al pulsar...» → `addEventListener("click", ...)`.
- «Al enviar...» → `addEventListener("submit", ...)`.
- «Mientras escribe...» → `addEventListener("input", ...)`.
- «Guarda...» → `localStorage.setItem(...)`.
- «Recupera...» → `localStorage.getItem(...)`.
- «Elimina...» → `localStorage.removeItem(...)`.

## Método para resolver cualquier ejercicio

1. Lee qué datos tienes: array, objeto, formulario o HTML.
2. Identifica qué resultado te piden: mostrar, devolver, guardar, modificar o eliminar.
3. Selecciona los elementos HTML si hacen falta.
4. Escribe primero la estructura principal (función, evento o clase).
5. Completa la condición o el recorrido.
6. Prueba un caso correcto y otro incorrecto.
7. Comprueba que no estás confundiendo `return` con `console.log()`.

## Errores frecuentes

- Escribir `Constructor` en vez de `constructor`.
- Olvidar `this.propiedad = parametro`.
- Usar `=` cuando se quería comparar con `===`.
- Olvidar `return` dentro de `filter()` o `reduce()`.
- Poner un evento fuera del bloque donde se crea el elemento.
- Usar `textContent` pensando que interpreta etiquetas HTML.
- No usar `event.preventDefault()` al validar un formulario.
- Olvidar que `localStorage` devuelve texto o `null`.
- Olvidar `defer` en el `<script>` del `<head>`.
