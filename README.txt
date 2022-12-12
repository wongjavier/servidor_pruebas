1-para el caso de uso de buscar un usuario por un id use el fichero de variables de entorno .env.test y ponga en USER_ID el id de usuario que quiere ver si existe.
2-para el caso de uso de guardar un usuario utilice el fichero de variables de entorno .env.test y ponga el USER_NAME, USER_EMAIL, USER_PASS.
3-para conectarse a la base de datos utilice el fichero de variables de entorno .env.test y cambie valores de DB_HOST, DB_USER, DB_PASS, DB_NAME.
4-para migrar la base de datos utilice el comando composer phinx-migrate.
5-para testear el proyecto utilice el comando composer run-tests.