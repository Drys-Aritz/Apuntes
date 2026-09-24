const ejercicios = document.getElementById("ejercicios");
const cargar = document.getElementById("cargar");
const resultado = document.getElementById("resultado");
let scriptActual;

function mostrar(mensaje) {
    const linea = document.createElement("div");
    linea.textContent = mensaje;
    resultado.appendChild(linea);
}

cargar.addEventListener("click", function () {

    const archivo = ejercicios.value;
    resultado.innerHTML = "";

    if (archivo === "") {
        mostrar("Selecciona un ejercicio");
        return;
    }

    if (scriptActual) {
        scriptActual.remove();
    }

    const consolaOriginal = {
        log: console.log,
        info: console.info,
        error: console.error
    };

    console.log = (...mensajes) => mostrar(mensajes.join(" "));
    console.info = (...mensajes) => mostrar(mensajes.join(" "));
    console.error = (...mensajes) => mostrar(`Error: ${mensajes.join(" ")}`);

    scriptActual = document.createElement("script");
    scriptActual.src = `${archivo}?t=${Date.now()}`;
    scriptActual.onload = () => {
        console.log = consolaOriginal.log;
        console.info = consolaOriginal.info;
        console.error = consolaOriginal.error;
    };
    scriptActual.onerror = () => {
        mostrar(`No se pudo cargar ${archivo}`);
        console.log = consolaOriginal.log;
        console.info = consolaOriginal.info;
        console.error = consolaOriginal.error;
    };

    document.body.appendChild(scriptActual);

});
