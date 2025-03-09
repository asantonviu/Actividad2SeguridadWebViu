<span>
<p align="center"><a href="https://www.universidadviu.com/es/" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/f/f8/Logo_VIU.png" width="400" alt="VIU Logo"></a></p>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center"><a href="https://www.mailersend.com" target="_blank"><img src="https://www.mailersend.com/images/logo.svg" width="400" alt="MailerSend Logo"></a></p>


</span>

## Developers

  - Antonio Sánchez Antón
  - Febe Rubén Fariña Aguirre

Estudiantes del Máster Universitario en Desarrollo de Aplicaciones y Servicios Web de la Universidad Internacional de Valencia (VIU). 
Forma parte de la asignatura de Seguridad Web impartida por el profesor Francisco Gomez Arnal, en concreto su Actividad 2.

## Description

Actividad enfocada al uso de Laravel Breeze donde:
  - Se incorporará al modelo de usuario (User) dos campos más que se deberán recoger a través del formulario de registro de datos, ambos deben ser obligatorios y validados a través del controlador de registro.
    Los campos son el apellido (surname) y la fecha de nacimiento (date_birth). 
    La validación del surname es similar al name actual mientras que la validación de la fecha de nacimiento es que no se permitan fechas futuras. 
    Se validan los password para que tengan, al menos, 12 caracteres que sean combinaciones de mayúsculas, minúsculas,números y caracteres especiales. 
    Existe un usuario con rol admin cuyo email es: "admin@example.com" y cuyo password es: "passworD12?_". 
  - Se incorporará al modelo de usuario (User) un campo de rol (NO ES NECESARIO UNA TABLA NUEVA). Los nuevos usuarios dados de alta tendrán el rol guest, mientras que habrá un usuario con rol admin.
  - Se creará una nueva ruta, que listará los usuarios y que sólo podrá acceder el usuario con rol admin. 
    La ruta nueva (/info) se accede desde el DashBoard ("Go to Info User") y, en caso de que el usuario autenticado tenga rol admin, se mostrará información de todos los usuarios disponibles. En caso contrario se mostrará información del usuario autenticado. 
    Dicha ruta es atendida por el controlador: "InfoUserController" y renderizada por la vista: "infouser.blade". 

La actividad hace uso de Sail, por lo que lleva una BBDD MySQL. 
Entregamos Migrations para el modelo de datos y un Seeder que realiza la creación de algunos usuarios. 
La actividad hace uso de MailerSend, por lo que los mails de los usuarios recibirán email de verificación en los casos necesarios.



## License
La aplicacion tiene un proposito académico. 
Utiliza el framework Laravel, que es un framework Open Source con licencia [MIT license](https://opensource.org/licenses/MIT).

