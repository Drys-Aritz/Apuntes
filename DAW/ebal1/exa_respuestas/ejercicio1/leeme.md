# Construir imagen
docker build -t text-utils:1.0 .

# Comprobar imagen
docker images

# Ejecutar y probar
docker run --rm text-utils:1.0 "Hola mundo desde Docker"