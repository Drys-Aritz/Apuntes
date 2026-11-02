/* 2. ARRAYS (array.js) */
function addArray(array, elemento) {
  array.unshift(elemento);          // por el PRINCIPIO (push sería por el final)
  mostrarArray(array);
}
function mostrarArray(array) {
  array.forEach(d => console.log(d.mostrar()));   // usando el método del objeto
}
