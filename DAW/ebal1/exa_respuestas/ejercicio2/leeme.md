# 1. Crear la red
docker network create miSarea

# 2. Crear el servidor
docker run -d --name servidor --network miSarea nginx:alpine

# 3. Crear el cliente de forma interactiva
docker run -it --name cliente --network miSarea alpine:latest sh

# 4. Desde dentro del cliente, comprobar la conexión
ping -c 3 servidor