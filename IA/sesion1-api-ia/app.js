const formEco = document.querySelector("#formEco");
const resultadoEco =
document.querySelector("#resultadoEco");
formEco.addEventListener("submit", async (event) => {
event.preventDefault();
const datos = {
nombre: document.querySelector("#nombre").value,
asignatura: document.querySelector("#asignatura").value,
curso: document.querySelector("#curso").value
};
try {
const response = await fetch("api/eco.php", {
method: "POST",
headers: {
"Content-Type": "application/json"
},
body: JSON.stringify(datos)
});
const resultado = await response.json();
if (!response.ok) {
throw new Error(resultado.error ?? "Error HTTP");
}
resultadoEco.textContent =
JSON.stringify(resultado, null, 2);
} catch (error) {
resultadoEco.textContent =
"ERROR: " + error.message;
}
});