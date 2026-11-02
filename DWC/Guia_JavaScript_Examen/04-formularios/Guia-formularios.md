# 4. Formularios y validación: alternativas

## Plantilla general

```js
const formulario = document.getElementById("miFormulario");

formulario.addEventListener("submit", function(event) {
  event.preventDefault();

  const campo = document.getElementById("campo");
  const mensaje = document.getElementById("mensaje");
  const valor = campo.value.trim();

  mensaje.textContent = "";

  if (valor === "") {
    mensaje.textContent = "El campo es obligatorio";
    mensaje.style.color = "red";
  } else {
    mensaje.textContent = "Datos correctos";
    mensaje.style.color = "green";
  }
});
```

## A. Comprobar longitud

```js
const nombreValido = nombre.length >= 3 && nombre.length <= 30;
```

## B. Comprobar un número dentro de un rango

```js
const edad = Number(campoEdad.value);
const edadValida = campoEdad.value !== "" && edad >= 18 && edad <= 100;
```

Se comprueba también que no esté vacío porque `Number("")` se convierte en `0`.

## C. Comprobar un correo

```js
const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const correoValido = regexCorreo.test(correo);
```

Es una comprobación sencilla de formato, no una garantía de que el correo exista.

## D. Comprobar una contraseña

```js
const passwordValida = password.length >= 8;
```

Para exigir al menos una mayúscula, una minúscula y un número:

```js
const regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
const passwordValida = regexPassword.test(password);
```

## E. Comprobar que dos campos coinciden

```js
const password = document.getElementById("password").value;
const repetir = document.getElementById("repetir").value;

const coinciden = password === repetir;
```

## F. Comprobar que una opción está seleccionada

```js
const categoria = document.getElementById("categoria").value;
const categoriaValida = categoria !== "";
```

## G. Mostrar varios errores

```js
mensaje.textContent = "";

if (!nombreValido) {
  mensaje.textContent += "Nombre incorrecto.\n";
}

if (!correoValido) {
  mensaje.textContent += "Correo incorrecto.\n";
}

if (!passwordValida) {
  mensaje.textContent += "Contraseña incorrecta.\n";
}

if (mensaje.textContent === "") {
  mensaje.textContent = "Formulario correcto";
}
```

Si usas `\n` con `textContent`, puedes aplicar:

```js
mensaje.style.whiteSpace = "pre-line";
```

## Expresiones regulares útiles

| Patrón | Qué comprueba |
|---|---|
| `/^\d{4}$/` | Exactamente cuatro cifras |
| `/^[0-9]{5}$/` | Exactamente cinco cifras |
| `/^[a-zA-Z]{3,20}$/` | De 3 a 20 letras inglesas |
| `/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,50}$/` | De 3 a 50 letras y espacios, incluyendo letras españolas |
| `/^[^\s@]+@[^\s@]+\.[^\s@]+$/` | Formato básico de correo |

## Símbolos de regex

- `^`: inicio del texto.
- `$`: final del texto.
- `\d`: un dígito.
- `\s`: un espacio en blanco.
- `{3,50}`: mínimo 3 y máximo 50 repeticiones.
- `+`: una o más repeticiones.
- `*`: cero o más repeticiones.
- `[abc]`: un carácter de los indicados.
- `(...)`: agrupa alternativas o partes de un patrón.
