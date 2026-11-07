# 1. Crear el volumen
docker volume create Datos

# 2. Crear el primer contenedor MySQL
docker run -d --name mysql1 -e MYSQL_ROOT_PASSWORD=1234 -v Datos:/var/lib/mysql mysql:8.0

# 3. Entrar en MySQL
docker exec -it mysql1 mysql -uroot -p
1234

# 4. Dentro de MySQL, crear la base de datos
CREATE DATABASE prueba;
SHOW DATABASES;
EXIT;

# 5. Eliminar el primer contenedor
docker rm -f mysql1

# 6. Crear otro contenedor con el mismo volumen
docker run -d --name mysql2 -e MYSQL_ROOT_PASSWORD=1234 -v Datos:/var/lib/mysql mysql:8.0

# 7. Entrar en el segundo contenedor
docker exec -it mysql2 mysql -uroot -p

# 8. Comprobar que la base de datos sigue existiendo
SHOW DATABASES;


# Pregunta (0,7 puntos) ¿Aún existe la base de datos?
Sí, la base de datos sigue existiendo porque los datos están guardados en el volumen `Datos`, no directamente en el contenedor. Aunque eliminemos el contenedor, el volumen permanece y conserva la información.