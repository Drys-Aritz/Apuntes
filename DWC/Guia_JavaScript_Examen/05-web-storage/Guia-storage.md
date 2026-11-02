# 5. Web Storage: alternativas

## Diferencia entre localStorage y sessionStorage

- `localStorage`: los datos permanecen aunque cierres la pestaña o el navegador, hasta que se eliminen.
- `sessionStorage`: los datos se mantienen durante la sesión de esa pestaña y se eliminan al terminarla.

Ambos guardan claves y valores como cadenas de texto.

## A. Guardar, recuperar y eliminar una preferencia

```js
localStorage.setItem("idioma", "es");

const idioma = localStorage.getItem("idioma");

localStorage.removeItem("idioma");
```

## B. Guardar un número

```js
localStorage.setItem("puntos", 25);

// getItem devuelve texto, por eso convertimos a número.
const puntos = Number(localStorage.getItem("puntos"));
```

## C. Guardar un objeto con JSON

`localStorage` no guarda objetos directamente como objetos. Se convierten a texto con `JSON.stringify()` y se recuperan con `JSON.parse()`.

```js
const usuario = {
  nombre: "Ane",
  edad: 21
};

// Convertimos el objeto en texto JSON.
localStorage.setItem("usuario", JSON.stringify(usuario));

// Recuperamos el texto y lo convertimos en objeto.
const textoGuardado = localStorage.getItem("usuario");

if (textoGuardado !== null) {
  const usuarioRecuperado = JSON.parse(textoGuardado);
  console.log(usuarioRecuperado.nombre);
}
```

## D. Guardar una lista

```js
const favoritos = ["Matrix", "Dune", "Titanic"];

localStorage.setItem("favoritos", JSON.stringify(favoritos));

const texto = localStorage.getItem("favoritos");
const favoritosGuardados = texto === null ? [] : JSON.parse(texto);
```

## E. Añadir un elemento a una lista guardada

```js
function guardarFavorito(nuevoFavorito) {
  const texto = localStorage.getItem("favoritos");

  // Si no existe todavía, empezamos con un array vacío.
  const favoritos = texto === null ? [] : JSON.parse(texto);

  favoritos.push(nuevoFavorito);

  localStorage.setItem("favoritos", JSON.stringify(favoritos));
}
```

## F. sessionStorage

```js
sessionStorage.setItem("paso", "2");

const paso = sessionStorage.getItem("paso");

sessionStorage.removeItem("paso");
```

## G. Comprobar si existe una clave

```js
const nombre = localStorage.getItem("usuario");

if (nombre === null) {
  console.log("No hay usuario guardado");
} else {
  console.log("Usuario:", nombre);
}
```

## Precaución

No guardes contraseñas ni información sensible en `localStorage`. Es almacenamiento del navegador accesible desde JavaScript de la página.
