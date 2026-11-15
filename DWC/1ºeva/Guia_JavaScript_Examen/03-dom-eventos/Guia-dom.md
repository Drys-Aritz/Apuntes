# 3. DOM y eventos: alternativas

## Plantilla inicial

HTML:

```html
<button id="accion">Pulsar</button>
<p id="resultado">Texto inicial</p>
```

JavaScript:

```js
const boton = document.getElementById("accion");
const resultado = document.getElementById("resultado");

boton.addEventListener("click", function() {
  resultado.textContent = "Se ha pulsado el botón";
});
```

## A. Cambiar una clase CSS

```js
const tarjeta = document.getElementById("tarjeta");

tarjeta.addEventListener("click", function() {
  tarjeta.classList.toggle("seleccionada");
});
```

`classList.toggle()` añade la clase si no existe y la quita si ya existe.

## B. Mostrar u ocultar un elemento

```js
const botonMostrar = document.getElementById("mostrar");
const panel = document.getElementById("panel");

botonMostrar.addEventListener("click", function() {
  if (panel.style.display === "none") {
    panel.style.display = "block";
  } else {
    panel.style.display = "none";
  }
});
```

## C. Eliminar el elemento pulsado

```js
const botonesEliminar = document.querySelectorAll(".eliminar");

botonesEliminar.forEach(function(boton) {
  boton.addEventListener("click", function() {
    boton.parentElement.remove();
  });
});
```

`querySelectorAll()` selecciona todos los elementos que coinciden con un selector CSS. `parentElement` accede al elemento padre.

## D. Crear una lista desde un array

```js
const tareas = ["Estudiar", "Hacer ejercicio", "Leer"];
const lista = document.getElementById("lista");

tareas.forEach(function(tarea) {
  const li = document.createElement("li");
  li.textContent = tarea;
  lista.append(li);
});
```

## E. Evento `input`: reaccionar mientras se escribe

```js
const campo = document.getElementById("busqueda");
const salida = document.getElementById("salida");

campo.addEventListener("input", function() {
  salida.textContent = campo.value;
});
```

## F. Evento `change`: reaccionar al cambiar una opción

```js
const selector = document.getElementById("categoria");
const salidaCategoria = document.getElementById("categoriaElegida");

selector.addEventListener("change", function() {
  salidaCategoria.textContent = selector.value;
});
```

## G. Evitar duplicados al volver a pintar una lista

```js
boton.addEventListener("click", function() {
  lista.replaceChildren(); // Vacía la lista antes de volver a crearla.

  elementos.forEach(function(elemento) {
    const li = document.createElement("li");
    li.textContent = elemento;
    lista.append(li);
  });
});
```

## Eventos frecuentes

| Evento | Cuándo ocurre |
|---|---|
| `click` | Al pulsar |
| `submit` | Al enviar un formulario |
| `input` | Al cambiar el contenido de un campo |
| `change` | Al confirmar un cambio de valor |
| `mouseenter` | Al entrar el ratón |
| `mouseleave` | Al salir el ratón |
| `keydown` | Al pulsar una tecla |

## Atención

- `textContent` inserta texto literal; no interpreta etiquetas HTML.
- `innerHTML` interpreta HTML, pero no debes introducir en él texto no confiable del usuario.
- Si el script está en el `<head>`, utiliza `<script src="archivo.js" defer></script>`.
