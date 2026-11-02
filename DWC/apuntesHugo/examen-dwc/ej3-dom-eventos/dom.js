/* EJERCICIO 3 - EVENTOS Y DOM (2025-26) + crearElemento/crearImagen (2024-25)
   NO usar innerHTML: createElement + textContent + appendChild */
const peliculas = [{ titulo: "Matrix" }, { titulo: "Dune" }, { titulo: "El Padrino" }];

// Funciones reutilizables (2024-25)
function crearElemento(etiqueta, texto) {
  const el = document.createElement(etiqueta);
  el.textContent = texto;
  return el;
}
function crearImagen(ruta, textoAlt) {
  const img = document.createElement("img");
  img.src = ruta;
  img.alt = textoAlt;
  return img;
}

document.getElementById("btnMostrar").addEventListener("click", function () {
  const ul = document.getElementById("listaPeliculas");
  ul.textContent = "";                         // vaciar para no duplicar al pulsar dos veces
  peliculas.forEach(p => {
    const li = crearElemento("li", p.titulo);
    li.addEventListener("mouseover", () => { li.style.fontWeight = "bold"; });
    li.addEventListener("mouseout", () => { li.style.fontWeight = "normal"; });
    ul.appendChild(li);
  });
});

// Estilo "bidaiaSortutaDOM": 1 h3 + 5 p + 1 img dentro de #mensaje
function viajeDOM(v) {
  const div = document.getElementById("mensaje");
  div.appendChild(crearElemento("h3", v.titulo));            // 1ª de 6 veces
  div.appendChild(crearElemento("p", "Destino: " + v.destino));
  div.appendChild(crearElemento("p", "Fecha: " + v.fecha));
  div.appendChild(crearElemento("p", "Precio: " + v.precio + " €"));
  div.appendChild(crearElemento("p", "Categoría: " + v.categoria));
  div.appendChild(crearElemento("p", "Descripción: " + v.descripcion));
  div.appendChild(crearImagen("images/default.jpg", v.titulo)); // 1 vez
}
