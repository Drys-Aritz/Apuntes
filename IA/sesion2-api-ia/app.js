//ejercicio 2
const formTexto = document.querySelector("#formTexto");
const concepto = document.querySelector("#concepto");
const estadoTexto = document.querySelector("#estadoTexto");
const resultadoTexto = document.querySelector("#resultadoTexto");
formTexto.addEventListener(
    "submit",
    async function (event) {
        event.preventDefault();
        const prompt = `
Explica qué es "${concepto.value}"
a un niño de 8 años.
Utiliza vocabulario sencillo.
Máximo 60 palabras.
`;
        estadoTexto.textContent = "Generando respuesta...";
        resultadoTexto.textContent = "";
        try {
            const response = await fetch(
                "api/texto.php",
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ prompt: prompt })
                }
            );
            const datos = await response.json();
            if (!response.ok) {
                throw new Error(datos.error ?? "Error desconocido");
            }
            resultadoTexto.textContent = datos.texto;
            estadoTexto.textContent = "";
        }
        catch (error) {
            estadoTexto.textContent = "ERROR: " + error.message;
        }
    }
);