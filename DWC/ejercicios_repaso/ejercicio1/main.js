let nombre = prompt("Ingrese su nombre");

while (nota < 0 || nota > 10) {
    nota = parseFloat(prompt("Ingrese su nota del examen (entre 0 y 10):"));
}