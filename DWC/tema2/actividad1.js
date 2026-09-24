(() => {
let nombre;
const cadena = "lopez";

let eliminarEspacio;
let convertirMinusculas;
let Comprobador;
let MostradorLongitud;
let identificador;


nombre = prompt("Introducir Nombre:") || "";
console.log(nombre);

eliminarEspacio = nombre.trim();
console.log(eliminarEspacio);

convertirMinusculas = eliminarEspacio.toLowerCase();
console.log(convertirMinusculas);

Comprobador = convertirMinusculas.includes(cadena);
console.log(Comprobador);

//MostradorLongitud = convertirMinusculas;
//console.log(MostradorLongitud.length);
console.log(convertirMinusculas.length);

identificador = convertirMinusculas.replace(/\s+/g, ".");
console.log(identificador);
})();