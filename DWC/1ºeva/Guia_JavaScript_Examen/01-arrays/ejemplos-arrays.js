// EJEMPLOS DE ARRAYS
const alumnos = [
  { nombre: "Ane", nota: 8, asistencia: true },
  { nombre: "Iker", nota: 4, asistencia: true },
  { nombre: "Marta", nota: 6, asistencia: false },
  { nombre: "Unai", nota: 9, asistencia: true }
];

// 1. Mostrar nombres
alumnos.forEach(function(alumno) {
  console.log(alumno.nombre);
});

// 2. Obtener aprobados
const aprobados = alumnos.filter(function(alumno) {
  return alumno.nota >= 5;
});

// 3. Buscar un alumno por nombre
const alumnoBuscado = alumnos.find(function(alumno) {
  return alumno.nombre === "Marta";
});

// 4. Obtener solamente las notas
const notas = alumnos.map(function(alumno) {
  return alumno.nota;
});

// 5. Calcular la media
const media = alumnos.reduce(function(suma, alumno) {
  return suma + alumno.nota;
}, 0) / alumnos.length;

// 6. Comprobar si alguien ha suspendido
const haySuspensos = alumnos.some(function(alumno) {
  return alumno.nota < 5;
});

// 7. Comprobar si todos tienen asistencia
const todosAsisten = alumnos.every(function(alumno) {
  return alumno.asistencia;
});

console.log({ aprobados, alumnoBuscado, notas, media, haySuspensos, todosAsisten });
