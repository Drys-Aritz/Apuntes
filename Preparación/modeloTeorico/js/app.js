
function rotarMatriz(matriz) {
    const n = matriz.length;
    const resultado = [];

    for (let j = 0; j < n; j++) {
        const fila = [];

        for (let i = n - 1; i >= 0; i--) {
            fila.push(matriz[i][j]);
        }

        resultado.push(fila);
    }

    return resultado;
}

// Ejemplo de uso
const matriz = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

console.log(rotarMatriz(matriz));
// Resultado: [[7, 4, 1], [8, 5, 2], [9, 6, 3]]
