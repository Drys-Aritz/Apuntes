let opcionMenu = 0;
let saldoActual = 100;


//El programa debe mostrar un menú:
//1. Consultar saldo
//2. Ingresar dinero
//3. Retirar dinero
//4. Consultar número de operaciones
//5. Salir
do {
    opcionMenu = prompt("Seleccione una opcion" + "\n" +
        "1. Consultar saldo" + "\n" +
        "2. Ingresar dinero" + "\n" +
        "3. Retirar dinero" + "\n" +
        "4. Número de operaciones" + "\n" +
        "5. Salir");
    switch (opcionMenu) {
        case "1":
            consultarSaldo();
            break;
        case "2":
            console.log("Has entrado en la opción 2");
            ingresarDinero();
            break;

        case "3":
            console.log("Has entrado en la opción 3");
            break;

        case "4":
            console.log("Has entrado en la opción 4");
            break;
        case "5":
            opcionMenu = "exit";
            break;
    }

} while (opcionMenu !== 0 && opcionMenu !== "exit");

//Consultar saldo
//Debe mostrar:
//● Saldo actual.
//● Número de operaciones realizadas.
function consultarSaldo() {
    let numeroOperaciones;

    console.log("Saldo actual: " + saldoActual + "€");

    //Número de operaciones realizadas

}

//Ingresar dinero
//El usuario introduce una cantidad.
//Debes comprobar que:
//● Es un número.
//● Es mayor que 0.
function ingresarDinero() {
    let cantidad;

    do {
        cantidad = Number(prompt("Introducir cuanto dinero deseas ingresar:"));
        if (typeof cantidad === "number" && cantidad > 0) {
            saldoActual += cantidad;
        }
    } while (typeof cantidad !== "number" && cantidad <= 0);
}

//Si es correcta, se suma al saldo.
//Retirar dinero
//El usuario introduce una cantidad.
//Debes comprobar:
//● Que sea válida.
//● Que sea mayor que 0.
//● Que haya suficiente saldo.

//No se puede retirar más dinero del disponible.
//Número de operaciones
//Debes llevar un contador de operaciones.
//Por ejemplo:
//● Ingreso → +1 operación.
//● Retirada → +1 operación.
//● Consulta de saldo → +1 operación.

//Parte extra
//Cuando el usuario salga del programa, muestra un resumen:
//● Saldo final.
//● Número de operaciones.
//● Dinero ingresado durante la sesión.
//● Dinero retirado durante la sesión.