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

### Actividad enfocada al uso de Laravel Breeze donde:
  1. Se incorporará al modelo de usuario (User) dos campos más que se deberán recoger a través del formulario de registro de datos, ambos deben ser obligatorios y validados a través del controlador de registro.
    Los campos son el apellido (surname) y la fecha de nacimiento (date_birth)
    La validación del surname es similar al name actual mientras que la validacion de la fecha de nacimiento es que no se permitan fechas futuras.
    Se validan los password para que tengan, al menos, 12 caracteres que sean combinaciones de mayúsculas, minúsculas,números y caracteres especiales.
    Existe un usuario con rol admin cuyo email es: "admin@example.com" y cuyo password es: "passworD12?_"
  2. Se incorporará al modelo de usuario (User) un campo de rol (NO ES NECESARIO UNA TABLA NUEVA). Los nuevos usuarios dados de alta tendrán el rol guest, mientras que habrá un usuario con rol admin.
  3. Se creará una nueva ruta, que listará los usuarios y que sólo podrá acceder el usuario con rol admin
    La ruta nueva (/info) se accede desde el DashBoard ("Go to Info User") y, en caso de que el usuario autenticado tenga rol admin, se mostrará información de todos los usuarios disponibles. En caso contrario se mostrará información del usuario autenticado.
    Dicha ruta es atendida por el controlador: "InfoUserController" y renderizada por la vista: "infouser.blade".

### Actividad enfocada al uso de Laravel Sanctum donde:
  1. Se utilizará el mismo modelo de User que con la autenticación con Breeze.  
  2. El sistema de registro se realizará mediante el paquete Breeze.  
  3. La obtención del token necesario se realizará mediante el login del paquete elegido (Sanctum) para la gestión de autorización en el caso del API REST.  
    El API para login está en:  
      POST a /api/seguridadweb/loginAPI con body JSON similar a: 
      ```  
      {"email": "admin@example.com", "password": "passworD12?_"}  
      ```  
     
    En caso de ir todo en orden, se devolverá un codigo http 200 con una respuesta similara a:  
    ```  
    {  
      "message": "Login OK",  
      "email": "admin@example.com",  
      "token_type": "Bearer",  
      "token": "3|Q1v4CBvHi7k9CQGcHvpLht9zn2OZmFhezrKDGDgKeafa4f92"  
    }  
    ```  

    En caso de error se devolverá el código de error asociado junto a un mensaje descriptivo.   
    El API para logout está en:  
      POST a /api/seguridadweb/logoutAPI con cabecera Authorization tipo Bearer con el token.  
    En caso de ir  todo en orden, se devolverá un codigo http 200 con una respuesta similara a:  
    ```  
    {  
      "message": "Logout OK"  
    }   
    ```   
    En caso de error se devolverá el código de error asociado junto a un mensaje descriptivo.  
  4. Se creará una ruta dentro del api para comprobar que se puede acceder a esta únicamente si se tiene el token de autenticación.  
    Para seguir el criterio seguido con Breeze, hemos creado 2 rutas (ver api.php), una autorizada a roles admin y que devuelve un JSON con todos los usuarios y otra para roles admin y guest que devuelve unicamente información del usuario.  
    Ruta para rol admin:  
      GET a /api/seguridadweb/infoAPI con cabecera Authorization tipo Bearer con el token.  
    En caso de ir todo en orden, se devolverá un codigo http 200 con una respuesta similara a:  
    ```  
    [  
    {  
        "id": 1,  
        "name": "Admin User",  
        "surname": "Administrador",  
        "birth_date": "1977-01-01T00:00:00.000000Z",  
        "email": "admin@example.com",  
        "rol": "admin",  
        "email_verified_at": "2025-03-09T10:26:33.000000Z",  
        "created_at": "2025-03-09T10:26:33.000000Z",  
        "updated_at": "2025-03-09T11:37:35.000000Z"  
    },  
    {  
        "id": 2,  
        "name": "Guest User 1",  
        "surname": "Johnson",  
        "birth_date": "1995-05-15T00:00:00.000000Z",  
        "email": "guest1@example.com",  
        "rol": "guest",  
        "email_verified_at": "2025-03-09T10:26:34.000000Z",  
        "created_at": "2025-03-09T10:26:34.000000Z",  
        "updated_at": "2025-03-09T10:26:34.000000Z"  
    },  
    {  
        "id": 3,  
        "name": "Guest User 2",  
        "surname": "Williams",  
        "birth_date": "2000-07-20T00:00:00.000000Z",  
        "email": "guest2@example.com",  
        "rol": "guest",  
        "email_verified_at": "2025-03-09T10:26:34.000000Z",  
        "created_at": "2025-03-09T10:26:34.000000Z",  
        "updated_at": "2025-03-09T10:26:34.000000Z"  
    }  
]  
    ```  
    Ruta para roles admin y guest:  
      GET a /api/seguridadweb/infoUserAPI con cabecera Authorization tipo Bearer con el token.  
    En caso de ir todo en orden, se devolverá un codigo http 200 con una respuesta similara a:  
    ```  
    {  
        "id": 4,  
        "name": "Guest User 1",  
        "surname": "Johnson",  
        "birth_date": "1977-08-09T00:00:00.000000Z",  
        "email": "guest1@example.com",  
        "rol": "guest",  
        "email_verified_at": "2025-03-09T11:34:20.000000Z",  
        "created_at": "2025-03-09T11:34:09.000000Z",  
        "updated_at": "2025-03-09T11:34:20.000000Z"  
    }  
    ```  
    Para el proceso de Autorización hemos creado un Middleware ("CheckUserRol") que recibe como parametros los roles que debe permitir. Si el rol del usuario esta entre los permitidos autoriza la petición en caso contrario devuelve un código http 403 indicando la causa.  
  
  

La actividad hace uso de Sail, por lo que lleva una BBDD MySQL
Entregamos Migrations para el modelo de datos y un Seeder que realiza la creación de algunos usuarios.
La actividad hace uso de MailerSend, por lo que los mails de los usuarios recibiran email de verificacion en los casos necesarios.  
***IMPORTANTE***  
Para el correcto funcionamiento de las llamadas a las API, es necesario que en las cabeceras de la peticion este la cabecera:  
   Accept:application/json  
En caso contrario los errores son servidos por la parte web.  



## License
La aplicación tiene un propósito académico.  
Utiliza el framework Laravel, que es un framework Open Source con licencia [MIT license](https://opensource.org/licenses/MIT).

