// =========================================================
// APUNTES JAVASCRIPT: variables, tipos, funciones, arrays, DOM
// =========================================================

// 1. Variables: const no permite reasignar; let sí permite.
const appName = "Apuntes DAW";
let counter = 0;
counter = counter + 1;

// Tipos básicos
const name = "Ana";           // string: texto
const age = 25;               // number: número
const isActive = true;        // boolean: true/false
const nothing = null;         // ausencia intencional de valor
let notAssigned;              // undefined: sin valor asignado

// 2. Operadores
const sum = 5 + 3;
const isAdult = age >= 18;
const sameValue = (5 === 5);   // comparar sin conversión de tipo
const bothTrue = true && false;
const oneTrue = true || false;
const opposite = !isActive;

// 3. Condicionales
if (age >= 18) {
    console.log("Mayor de edad");
} else {
    console.log("Menor de edad");
}

// 4. Switch: útil cuando hay varios valores concretos
const status = "pendiente";
switch (status) {
    case "pendiente":
        console.log("Queda trabajo por hacer");
        break;
    case "completada":
        console.log("Trabajo terminado");
        break;
    default:
        console.log("Estado desconocido");
}

// 5. Bucles
for (let i = 0; i < 3; i++) {
    console.log("Vuelta:", i);
}

const languages = ["HTML", "CSS", "JavaScript"];
for (const language of languages) {
    console.log(language);
}

// 6. Funciones: reutilizan lógica
function greet(person) {
    return `Hola, ${person}`;
}
console.log(greet("Ana"));

// Función flecha
const multiply = (a, b) => a * b;
console.log(multiply(3, 4));

// 7. Arrays: listas de valores
const numbers = [2, 4, 6];
numbers.push(8);                // añadir al final
numbers.pop();                  // quitar el último
console.log(numbers.length);    // número de elementos
console.log(numbers[0]);        // primer elemento: índice 0

// Métodos de arrays con objetos
const tasks = [
    { id: 1, title: "Estudiar HTML", done: true },
    { id: 2, title: "Practicar CSS", done: false },
    { id: 3, title: "Repasar PHP", done: false }
];

// map: transformar cada elemento
const titles = tasks.map(task => task.title);

// filter: seleccionar los que cumplen la condición
const pendingTasks = tasks.filter(task => !task.done);

// find: encontrar el primer elemento que coincide
const taskTwo = tasks.find(task => task.id === 2);

// some: comprobar si al menos uno cumple
const hasPending = tasks.some(task => !task.done);

// every: comprobar si todos cumplen
const allDone = tasks.every(task => task.done);

// reduce: acumular un resultado
const totalIds = tasks.reduce((sum, task) => sum + task.id, 0);

console.log(titles, pendingTasks, taskTwo, hasPending, allDone, totalIds);

// 8. Objetos y desestructuración
const user = { id: 7, name: "Luis", role: "admin" };
const { name: userName, role } = user;
console.log(userName, role);

// 9. DOM: buscar y cambiar elementos HTML
const heading = document.querySelector("h1");
if (heading) {
    heading.textContent = "Apuntes DAW - JavaScript";
}

// querySelector: primer elemento que coincide.
// querySelectorAll: todos los elementos que coinciden.
// getElementById: busca por id.
// classList.add/remove/toggle: gestionar clases CSS.

// 10. Eventos: reaccionar a una acción del usuario
const demoForm = document.getElementById("demo-form");
const formMessage = document.getElementById("form-message");

if (demoForm) {
    demoForm.addEventListener("submit", event => {
        // Evita la recarga/navegación predeterminada del formulario.
        event.preventDefault();

        const formData = new FormData(demoForm);
        const personName = String(formData.get("nombre") || "").trim();

        // Validación sencilla en el navegador; el servidor también debe validar.
        if (personName.length < 2) {
            formMessage.textContent = "Escribe al menos dos caracteres.";
            return;
        }

        formMessage.textContent = `Formulario válido para ${personName}.`;
    });
}

// 11. Crear elementos de forma segura
function addListItem(listElement, text) {
    const li = document.createElement("li");

    // textContent muestra texto, no interpreta etiquetas HTML.
    li.textContent = text;
    listElement.appendChild(li);
}

// 12. JSON: convertir objetos a texto y viceversa
const exampleObject = { title: "Tarea", done: false };
const jsonText = JSON.stringify(exampleObject);
const parsedObject = JSON.parse(jsonText);

// 13. Promesas y async/await: operaciones asíncronas
async function loadExample() {
    try {
        const response = await fetch("https://jsonplaceholder.typicode.com/todos/1");

        // fetch no lanza error automáticamente para HTTP 404/500.
        if (!response.ok) {
            throw new Error(`HTTP ${response.status}`);
        }

        const data = await response.json();
        console.log(data);
    } catch (error) {
        // Gestionar errores de red, HTTP lanzados arriba o JSON.
        console.error("No se pudieron cargar los datos:", error.message);
    }
}

// Descomenta la línea siguiente si quieres probar una petición de ejemplo.
// loadExample();

// 14. Temporizadores básicos
// setTimeout(() => console.log("Se ejecuta una vez"), 1000);
// setInterval(() => console.log("Se repite"), 1000);

// 15. Depuración
console.log("Mensaje de depuración");
console.table(tasks);
// Usa el depurador del navegador y breakpoints para inspeccionar variables.
