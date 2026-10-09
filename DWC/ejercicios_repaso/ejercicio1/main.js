let numeroAlumnos;
let alumno = [];
let notaExamen = [];

numeroAlumnos = prompt("Cuantos alumnos hay?");
//console.log(numeroAlumnos);

for (let i = 1; i <= numeroAlumnos; i++) {
    console.log("alumno " + i);
    alumno[i - 1] = prompt("Introducir nombre del alumno:");
    console.log(alumno[i - 1]);
    do {
        notaExamen[i - 1] = Number(prompt("Introducir nota del alumno:")) || 0;
    } while (notaExamen[i - 1] < 0 || notaExamen[i - 1] > 10);
    console.log(notaExamen[i - 1]);

}


//El número total de alumnos.
console.log("Numero de alumnos: " + numeroAlumnos);

//La nota media de la clase.
let suma = 0;
for (let i = 1; i < notaExamen.length; i++) { //importante que empiece por (i=1) y no (i=0)
    suma += notaExamen[i];
}
let media = suma / notaExamen.length;
console.log("media: " + media.toFixed(2));

//La nota más alta y quién la ha obtenido.
console.log("Nota más alta: " + Math.max(...notaExamen));
console.log("Alumno con la nota más alta: " + alumno[notaExamen.indexOf(Math.max(...notaExamen))]);

//La nota más baja y quién la ha obtenido.
console.log("Nota más baja: " + Math.min(...notaExamen));
console.log("Alumno con la nota más baja: " + alumno[notaExamen.indexOf(Math.min(...notaExamen))]);

//Cuántos alumnos han aprobado.
let aprovados = 0;
for (let i = 0; i < notaExamen.length; i++) {
    if (notaExamen[i] >= 5) {
        aprovados++;
    }
}
console.log("alumnos aprovados: " + aprovados);

//Cuántos alumnos han suspendido.
let suspendidos = 0;
for (let i = 0; i < notaExamen.length; i++) {
    if (notaExamen[i] < 5) {
        suspendidos++;
    }
}
console.log("alumnos que an suspendido: " + suspendidos);

/*Cuántos han sacado:
    ○ Sobresaliente (9-10)
    ○ Notable (7-8.99)
    ○ Bien (6-6.99)
    ○ Suficiente (5-5.99)
    ○ Suspenso (0-4.99)*/
let sobresalientes = 0;
let notables = 0;
let bienes = 0;
let suficientes = 0;
let suspensos = 0;
for (let i = 0; i < notaExamen.length; i++) {
    if (notaExamen[i] >= 9 && notaExamen[i] <= 10) {
        //console.log("Alumno: " + alumno[i] + " Sobresaliente: " + notaExamen[i]);
        sobresalientes += 1;
    } else if (notaExamen[i] >= 7 && notaExamen[i] <= 8.99) {
        //console.log("Alumno: " + alumno[i] + " Notable: " + notaExamen[i]);
        notables += 1;
    } else if (notaExamen[i] >= 6 && notaExamen[i] <= 6.99) {
        //console.log("Alumno: " + alumno[i] + " Bien: " + notaExamen[i]);
        bienes += 1;
    } else if (notaExamen[i] >= 5 && notaExamen[i] <= 5.99) {
        //console.log("Alumno: " + alumno[i] + " Suficiente: " + notaExamen[i])
        suficientes += 1;
    } else if (notaExamen[i] >= 0 && notaExamen[i] <= 4.99) {
        //console.log("Alumno: " + alumno[i] + " Suspenso: " + notaExamen[i])
        suspensos += 1;
    }
}
console.log("Sobresaliente: "+sobresalientes);
console.log("notables: "+notables);
console.log("bienes: "+bienes);
console.log("suficientes: "+suficientes);
console.log("suspensos: "+suspensos);


//El porcentaje de aprobados.
let alumnosAprbados = 0;
let porcentaje = 0;
for (let i = 0; i < notaExamen.length; i++) {
    if (notaExamen[i] >= 5) {
        alumnosAprbados++;
    }
}
porcentaje = alumnosAprbados / numeroAlumnos * 100;
console.log("aprobados: "+porcentaje.toFixed(2)+"%");
//El porcentaje de suspensos.
let alumnosSuspendidos = 0;
porcentaje = 0;
for (let i = 0; i < notaExamen.length; i++) {
    if (notaExamen[i] < 5) {
        alumnosSuspendidos++;
    }
}
porcentaje = alumnosSuspendidos / numeroAlumnos * 100;
console.log("aprobados: "+porcentaje.toFixed(2)+"%");