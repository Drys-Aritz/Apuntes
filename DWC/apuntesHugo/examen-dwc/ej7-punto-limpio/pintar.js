/* PINTAR optimizado: en vez de un if/switch por color (el código "propuesto"),
   se usa el propio color del objeto como nombre de clase CSS. Sin condicionales. */
function pintarColor(parrafo, descarga) {
  parrafo.classList.add(descarga.color.toLowerCase());   // "Amarillo" -> clase "amarillo"
}
