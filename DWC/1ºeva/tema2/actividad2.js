((() => {
    let precio;
    let cantidad;
    let importeTotal;

precio = Number(prompt("Introduce el precio del producto:"));
cantidad = Number(prompt("Introduce la cantidad comprada:"));

if (Number.isNaN(precio) || Number.isNaN(cantidad)) {
    alert("Por favor, introduce valores numéricos válidos.");
} else {
    importeTotal = precio * cantidad;
    alert("El importe total es: " + importeTotal.toFixed(2) + " €");
}
})());