import sys
import re

def contar_palabras(texto: str) -> int:
    # Elimina signos de puntuación y cuenta palabras
    palabras = re.findall(r'\b\w+\b', texto)
    return len(palabras)

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Uso: docker run text-utils:1.0 \"texto a procesar\"")
        sys.exit(1)
    texto = " ".join(sys.argv[1:])
    total = contar_palabras(texto)
    print(f"Número de palabras: {total}")
