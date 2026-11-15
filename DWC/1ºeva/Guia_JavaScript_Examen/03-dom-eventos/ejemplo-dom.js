const botonAgregar = document.getElementById("agregar");
const botonVaciar = document.getElementById("vaciar");
const lista = document.getElementById("lista");

let numeroTarea = 1;

botonAgregar.addEventListener("click", function() {
  const li = document.createElement("li");
  li.textContent = "Tarea " + numeroTarea;

  // Al pulsar una tarea, alternamos su clase visual.
  li.addEventListener("click", function() {
    li.classList.toggle("seleccionada");
  });

  lista.append(li);
  numeroTarea++;
});

botonVaciar.addEventListener("click", function() {
  lista.replaceChildren();
});
