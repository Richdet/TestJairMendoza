##
Para iniciar el sistema hay que configurar las credenciales de nuestra base de datos en el archivo .env

Una vez agregadas las credenciales, podemos ejecutar el siguiente comando, para poder instalar las tablas en la base de datos y crear registros para probar el sistema, es importante modificar los seeder, para no afectar el funcionamiento del sistema, ya que se han creado los restaurantes, conlas diferentes secciones y sus mesas correspondientes. Este comando debe ser ejecutado en consola dentro de nuestra carpeta del sistema

php artisan migrate:fresh --seed

Se crea un usuario por default
email: jair@email.com
password: password

Una vez logueado se encontrara en el dashboard, en el cual cuenta con 2 ventanas, la primera para los clientes y la segunda de las reservaciones.

