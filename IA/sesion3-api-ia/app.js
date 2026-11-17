let preguntaActual = null;
const formPregunta = document.querySelector("#formPregunta");
const tema = document.querySelector("#tema");
const estadoPregunta = document.querySelector("#estadoPregunta");
const enunciado = document.querySelector("#enunciado");
const opciones = document.querySelector("#opciones");
const botonPista = document.querySelector("#botonPista");
const pista = document.querySelector("#pista");
const mensaje = document.querySelector("#mensaje");
formPregunta.addEventListener("submit", async (event) => {
    event.preventDefault();
    estadoPregunta.textContent = "Generando pregunta...";
    enunciado.textContent = "";
    opciones.innerHTML = "";
    pista.textContent = "";
    mensaje.textContent = "";
    botonPista.hidden = true;
    try {
        const response = await fetch("api/pregunta.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ tema: tema.value })
        });
        const datos = await response.json();
        if (!response.ok) {
            throw new Error(datos.error ?? "Error");
        }
        preguntaActual = datos;
        enunciado.textContent = datos.pregunta;
        datos.opciones.forEach((opcion, indice) => {
            const boton = document.createElement("button");
            boton.type = "button";
            boton.textContent = opcion;
            boton.addEventListener("click", () => comprobar(indice));
            opciones.appendChild(boton);
        });
        botonPista.hidden = false;
        estadoPregunta.textContent = "";
    } catch (error) {
        estadoPregunta.textContent = "ERROR: " + error.message;
    }
});
function comprobar(indice) {
    if (!preguntaActual) { return; }
    if (indice === preguntaActual.correcta) {
        mensaje.textContent = "¡Correcto!";
    } else {
        mensaje.textContent = "No es correcto. Inténtalo otra vez.";
    }
}
botonPista.addEventListener("click", () => {
    if (preguntaActual) {
        pista.textContent = preguntaActual.pista;
    }
});