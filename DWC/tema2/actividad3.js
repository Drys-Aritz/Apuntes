(() => {
let tiradas = [];

for (let i = 1; i <= 20; i++) {
    tiradas[i - 1] = Math.floor(Math.random() * 6) + 1;
}

console.log(tiradas);

console.log(Math.max(...tiradas));
console.log(Math.min(...tiradas));

//calcular media
let suma = 0;
for (let i = 0; i < tiradas.length; i++) {
    suma += tiradas[i];
}
let media = suma / tiradas.length;
console.log(media.toFixed(2));

//Cuenta cuántas veces ha salido un 6
let count = 0;
for (let i = 0; i < tiradas.length; i++) {
    if (tiradas[i] === 6) {
        count++;
    }
}
console.log(count);
})();