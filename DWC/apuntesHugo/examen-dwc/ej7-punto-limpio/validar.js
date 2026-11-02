/* 3. VALIDAR (validar.js): devuelve array de errores; vacío = todo correcto */
function validar(nombre, kg) {
  const errores = [];
  const n = Number(kg);
  if (kg.trim() === "" || isNaN(n) || n < 1 || n > 100) errores.push("Los kg deben ser un número de 1 a 100");
  if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{3,20}$/.test(nombre)) errores.push("El nombre debe tener de 3 a 20 letras o espacios");
  return errores;
}
