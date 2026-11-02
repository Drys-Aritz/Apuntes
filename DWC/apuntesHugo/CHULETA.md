# CHULETA DWC - JavaScript (1ª evaluación)

## 0. Checklist de puntos "fáciles" que siempre se puntúan
- JS separado del HTML (`<script src="...">`), nada de `onclick=""` ni JS dentro del HTML
- Comentar las funciones
- Nombres claros (camelCase), `const`/`let`
- Funciones que DEBEN devolver valor -> `return`, y NO `console.log` dentro (restan puntos)
- Formulario que no debe enviarse -> `e.preventDefault()`
- No tocar el HTML si lo prohíben

## 1. Clases (getters/setters ESTÁNDAR)
```js
class Persona {
  constructor(nombre = "", edad = 0) { this._nombre = nombre; this._edad = edad; }
  get nombre() { return this._nombre; }          // NO getNombre()
  set nombre(valor) { this._nombre = valor; }
  mostrar() { return `${this._nombre} (${this._edad})`; }
}
const p = new Persona("Ane", 20);  p.nombre = "Jon";  console.log(p.mostrar());
```
- Atributo que "no se puede modificar directamente" -> NO le pongas setter
- Parámetros opcionales -> valor por defecto en el constructor

## 2. Arrays
| Quiero...                  | Uso |
|----------------------------|-----|
| recorrer                   | `arr.forEach(x => ...)` |
| transformar (nuevo array)  | `arr.map(x => x.titulo)` |
| filtrar                    | `arr.filter(x => x.cat === "Drama")` |
| buscar texto (sin may/min) | `x.toLowerCase().includes(texto.toLowerCase())` |
| media / suma               | `arr.reduce((acc, x) => acc + x.valor, 0) / arr.length` |
| ordenar texto              | `arr.sort((a,b) => a.localeCompare(b))` |
| ordenar números            | `arr.sort((a,b) => a - b)`  (NUNCA `a > b`) |
| añadir al principio / final| `arr.unshift(x)` / `arr.push(x)` |
| copiar antes de ordenar    | `[...arr].sort(...)`  (sort modifica el original) |

## 3. DOM y eventos (sin innerHTML)
```js
const li = document.createElement("li");
li.textContent = "texto";
li.addEventListener("mouseover", () => li.style.fontWeight = "bold");
li.addEventListener("mouseout",  () => li.style.fontWeight = "normal");
lista.appendChild(li);
// imagen
const img = document.createElement("img"); img.src = "images/default.jpg"; img.alt = "texto";
// fila de tabla: tr.append(td1, td2, td3); tbody.appendChild(tr);
// borrar último: tbody.removeChild(tbody.lastElementChild)
// vaciar: contenedor.textContent = ""
// mostrar/ocultar: el.style.display = "none" / "block"
// clases: el.classList.add("rojo") / remove / toggle
// reset formulario: form.reset()
```
Eventos: `click`, `submit` (en el FORM), `blur` (salir del campo), `change` (select), `mouseover`, `mouseout`.

## 4. Formularios y validación
```js
form.addEventListener("submit", e => { e.preventDefault(); ... });
valor = input.value.trim();                    // value SIEMPRE es texto: Number(valor)
select.options[select.selectedIndex].value    // value del option
select.options[select.selectedIndex].text     // texto visible del option
```
Regex:
- Letras, tildes, ñ y espacios, 3-20: `/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{3,20}$/.test(v)`
- 4 dígitos: `/^\d{4}$/`   ·   solo números: `/^\d+$/`
- Número entre a y b: `n >= a && n <= b` (con `isNaN(n)` antes)
- Varios errores en un alert: `const errores = []; errores.push("..."); alert(errores.join("\n"));`
- Una función por campo que DEVUELVE true/false + una general que las llama
- Fecha no anterior a hoy: `const hoy = new Date(); hoy.setHours(0,0,0,0); new Date(valor) >= hoy`
- Una sola función para nombre y país: `validarTexto(input, "Nombre")`

## 5. Fecha dd/mm/yyyy
```js
const d = new Date();
const f = `${String(d.getDate()).padStart(2,"0")}/${String(d.getMonth()+1).padStart(2,"0")}/${d.getFullYear()}`;
```
(`getMonth()` empieza en 0 -> sumar 1)

## 6. Web Storage
```js
localStorage.setItem("usuario", nombre);   // persiste
localStorage.getItem("usuario");           // null si no existe
localStorage.removeItem("usuario");
sessionStorage...                          // igual pero se borra al cerrar la pestaña
```
Patrón: una función `pintarEstado()` que lee el storage y ajusta botón/formulario/mensaje; se llama al cargar y tras guardar/borrar.

## 7. Trucos de "programación eficiente" (los piden)
- Sin if/switch por color/contenedor: usar el propio valor como id o clase
  `document.getElementById(color.toLowerCase())`, `p.classList.add(color.toLowerCase())`
- Reutilizar funciones (destinosOrdenados usa destinos(), pintarEstado se usa 2 veces)

## 8. Errores típicos al corregir código ajeno
`getElementByID`, `=` en vez de `===`, `addEventListener("click", f())` (paréntesis), variable sin declarar,
`value` comparado como texto (`"5" < "18"`), `.length = 0`, mostrar un array sin `join`, ejecutar antes de declarar (orden),
`sort` numérico mal, `<` vs `>`, `getMonth()` sin +1, no limpiar errores anteriores.

## 9. Cómo usar la carpeta en el examen
1. Lee el enunciado y busca en qué ejercicio de la carpeta se parece (ej1 arrays, ej2 objetos, ej3 DOM, ej4 validación, ej5 storage, ej6 tabla, ej7 punto limpio, ej8 corregir).
2. Copia la función, cambia nombres de variables/ids según el HTML del examen.
3. COMPRUEBA los ids del HTML del examen (`id="..."`): el 80% de los fallos son ids mal copiados.
4. Mira la tabla de puntos del examen: haz primero lo que da más puntos por menos esfuerzo.
