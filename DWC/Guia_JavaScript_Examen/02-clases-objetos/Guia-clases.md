# 2. Clases y objetos: alternativas

## Patrón básico

```js
class Libro {
  constructor(titulo, autor, paginas) {
    this.titulo = titulo;
    this.autor = autor;
    this.paginas = paginas;
  }

  descripcion() {
    return `${this.titulo}, de ${this.autor}, tiene ${this.paginas} páginas.`;
  }
}

const libro1 = new Libro("La sombra del viento", "Carlos Ruiz Zafón", 576);
console.log(libro1.descripcion());
```

## A. Método que devuelve un booleano

```js
class Alumno {
  constructor(nombre, nota) {
    this.nombre = nombre;
    this.nota = nota;
  }

  estaAprobado() {
    return this.nota >= 5;
  }
}
```

## B. Método que modifica una propiedad

```js
class Cuenta {
  constructor(titular, saldo) {
    this.titular = titular;
    this.saldo = saldo;
  }

  ingresar(cantidad) {
    if (cantidad > 0) {
      this.saldo += cantidad;
    }
  }

  retirar(cantidad) {
    if (cantidad > 0 && cantidad <= this.saldo) {
      this.saldo -= cantidad;
    }
  }
}
```

## C. Método que recibe un parámetro

```js
class Rectangulo {
  constructor(ancho, alto) {
    this.ancho = ancho;
    this.alto = alto;
  }

  calcularArea() {
    return this.ancho * this.alto;
  }

  esCuadrado() {
    return this.ancho === this.alto;
  }
}

const figura = new Rectangulo(5, 5);
console.log(figura.calcularArea()); // 25
console.log(figura.esCuadrado());   // true
```

## D. Crear muchos objetos y recorrerlos

```js
const libro1 = new Libro("Libro A", "Autora A", 100);
const libro2 = new Libro("Libro B", "Autor B", 250);

const biblioteca = [libro1, libro2];

biblioteca.forEach(function(libro) {
  console.log(libro.descripcion());
});
```

## E. Diferenciar clase, objeto, propiedad y método

- Clase: plantilla (`class Libro`).
- Objeto: elemento creado con `new` (`libro1`).
- Propiedad: dato del objeto (`this.titulo`).
- Método: función dentro de la clase (`descripcion()`).
- `this`: el objeto concreto que está utilizando el método.

## Errores típicos

- `constructor` siempre en minúscula.
- Dentro del constructor, asignar las propiedades con `this`.
- Crear instancias con `new`.
- Llamar al método usando paréntesis: `libro1.descripcion()`.
- Si el método debe entregar un resultado, usar `return`.
