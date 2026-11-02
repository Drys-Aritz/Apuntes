/* EJERCICIO 1 - ARRAYS (examen 2025-26 + 2024-25)
   a) mayusculas(): muestra por consola los títulos en mayúsculas
   b) peliculasPorCategoria(cat): DEVUELVE un array nuevo (no console.log dentro)
   c) buscarPorTitulo(texto): DEVUELVE las que contienen el texto (sin distinguir may/min)
   d) mediaValoraciones(): DEVUELVE la media
   e) (2024-25) destinosOrdenados, buscarDestino, destinosPrecios (<500 €)
*/
const peliculas = [
  { titulo: "Matrix", director: "Wachowski", anio: 1999, categoria: "Ciencia Ficción", valoracion: 8.7 },
  { titulo: "Dune", director: "Villeneuve", anio: 2021, categoria: "Ciencia Ficción", valoracion: 8.0 },
  { titulo: "Mufasa: The Lion King", director: "Jenkins", anio: 2024, categoria: "Animación", valoracion: 6.5 },
  { titulo: "El Padrino", director: "Coppola", anio: 1972, categoria: "Drama", valoracion: 9.2 }
];

// a) forEach + toUpperCase
function mayusculas() {
  peliculas.forEach(p => console.log(p.titulo.toUpperCase()));
}

// b) filter devuelve un array nuevo
function peliculasPorCategoria(categoria) {
  return peliculas.filter(p => p.categoria === categoria);
}

// c) includes + toLowerCase en AMBOS lados
function buscarPorTitulo(texto) {
  return peliculas.filter(p => p.titulo.toLowerCase().includes(texto.toLowerCase()));
}

// d) reduce (ojo: dividir entre peliculas.length)
function mediaValoraciones() {
  const suma = peliculas.reduce((acc, p) => acc + p.valoracion, 0);
  return suma / peliculas.length;
}

// ---- Pruebas (se comprueba con console.log FUERA de las funciones) ----
mayusculas();
console.log(peliculasPorCategoria("Ciencia Ficción"));
console.log(buscarPorTitulo("lion"));
console.log(mediaValoraciones());

/* ---------- Estilo 2024-25: viajes ---------- */
// En el examen destinos() ya venía hecha: devuelve array de títulos
const viajes = [
  { titulo: "Aventura en Islandia", precio: 480 },
  { titulo: "Costa Brava", precio: 350 },
  { titulo: "Safari Kenia", precio: 1200 },
  { titulo: "Aventura Alpes", precio: 450 }
];
function destinos() { return viajes.map(v => v.titulo); }

// Reutiliza destinos() y ordena: sort() sin parámetros ordena texto; localeCompare respeta tildes
function destinosOrdenados() {
  return destinos().sort((a, b) => a.localeCompare(b));
}

// Busca en el texto de un input y muestra en un alert
function buscarDestino() {
  const texto = document.getElementById("buscador").value.toLowerCase();
  const encontrados = destinos().filter(d => d.toLowerCase().includes(texto));
  alert(encontrados.join("\n"));
}

// Errores típicos de ChatGPT: sort numérico mal (a.precio > b.precio no devuelve número),
// parseFloat sin limpiar "€", filtrar con > en vez de <.
function destinosPrecios() {
  return viajes
    .filter(v => v.precio < 500)               // solo menores de 500 €
    .sort((a, b) => a.precio - b.precio)       // ORDEN NUMÉRICO: a - b (nunca a > b)
    .map(v => `${v.titulo}: ${v.precio} €`);
}
console.log(destinosOrdenados(), destinosPrecios());
