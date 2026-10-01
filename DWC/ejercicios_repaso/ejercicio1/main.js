let numeroAlumnos;
let alumno;
let notaExamen;

numeroAlumnos = prompt("Cuanros alumnos hay?") || "";
console.log(numeroAlumnos);

for (i = 0; i = numeroAlumnos; i++) {
    console.log("alumno " + i);
    alumno = prompt("Introducir nombre del alumno:") || "";
    console.log(alumno);
    while (notaExamen != 0 || notaExamen != 10) {
        notaExamen = prompt("Introducir nota del alumno:") || "";
        console.log(notaExamen);
    }

}


//El número total de alumnos.
//La nota media de la clase.
//La nota más alta y quién la ha obtenido.
//La nota más baja y quién la ha obtenido.
//Cuántos alumnos han aprobado.
//Cuántos alumnos han suspendido.
/*Cuántos han sacado:
    ○ Sobresaliente (9-10)
    ○ Notable (7-8.99)
    ○ Bien (6-6.99)
    ○ Suficiente (5-5.99)
    ○ Suspenso (0-4.99)*/
//El porcentaje de aprobados.
//El porcentaje de suspensos.