(() => {
const nombres = ["Tokio", "Berlín", "Moscú", "Nairobi", "Lisboa", "Helsinki", "Denver", "Palermo"];

let nombre = prompt("Introduce un nombre de ciudad:") || "";
nombre = nombre.trim().toLowerCase();

const convertidor = nombres.map(function (elemento) {
    return elemento.toLowerCase();
});

//1º
// Comprobación de si el nombre pertenece a la colección
if (convertidor.includes(nombre)) {
    console.log("El nombre pertenece a la colección.");
} else {
    console.log("El nombre no pertenece a la colección.");
}

//2º
// Comprobación de si el nombre contiene la cadena
// Se utiliza indexOf para comprobar si el nombre se encuentra en la cadena
// Si indexOf devuelve -1, significa que no se encuentra en la cadena
// IndexOf devuelve la posición del primer elemento encontrado, por lo que si es diferente de -1, significa que se encuentra en la cadena
convertidor.indexOf(nombre) !== -1 ? console.log("El nombre contiene la cadena.") : console.log("El nombre no contiene la cadena.");

//3º
// Comprobación de si el nombre se encuentra en la cadena
// Se recorre el array y se compara cada elemento con el nombre introducido
// Length se utiliza para obtener el número de elementos del array y así poder recorrerlo correctamente
for (let i = 0; i < convertidor.length; i++) {
    if (convertidor[i] === nombre) {
        console.log(`El nombre se encuentra en la cadena`);
        break;
    } else if (i === convertidor.length - 1) {
        console.log(`El nombre no se encuentra en la cadena`);
    }
}

//4º
// Comprobación de si el nombre se encuentra en la cadena utilizando find
// El método find devuelve el primer elemento que cumple con la condición, o undefined si no se encuentra
convertidor.find(function (elemento) {
    return elemento === nombre;
}) ? console.log("El nombre se encuentra en la cadena.") : console.log("El nombre no se encuentra en la cadena.");

//5º
// Comprobación de si el nombre se encuentra en la cadena utilizando Set
// Se crea un Set a partir del array convertidor, que elimina los elementos duplicados y permite una búsqueda más eficiente
// Set tiene un método has que devuelve true si el elemento se encuentra en el Set, o false si no se encuentra
const nombresSet = new Set(convertidor);
nombresSet.has(nombre) ? console.log("El nombre se encuentra en la cadena.") : console.log("El nombre no se encuentra en la cadena.");
})();