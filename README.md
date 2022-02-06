# user-mgmt
*Escribe un programa PHP que permita a los usuarios registrarse automáticamante rellenando un formulario de registro con los 
campos de usuario, contraseña, correo electrónico y un desplegable con nombre de pintores 
para que el usuario escoja su pintor favorito. Una vez enviados esos datos al servidor creará un nuevo registro
en la base de datos con los credenciales aportados por el usuario y se presentará al
usuario la ventana de login para que pueda iniciar sesión con los mismos.
Las credenciales se comprobarán internamente con la
información almacenada en la base de datos (parejas de usuario y password).
Si los datos no son correctos se volverá a presentar el formulario de inicio de sesión
solicitando el nombre de usuario y contraseña.
Si el usuario y password es correcto se direccionará al usuario a una página privada
que contiene un mensaje personalizado con su nombre y una serie de cuadros de su pintor favorito. El usuario podrá
pinchar en alguno de los cuadros para acceder a una ventana de detalle del cuadro con información sobre el mismo. Se
mostrará una descripción del cuadro, fecha en la que fue pintado y museo en el que se puede ver. De la página del detalle 
del cuadro se puede volver a la página con los cuadros del pintor.
El usuario podrá finalizar la sesión en cualquier momento. Una vez finalizada la sesión se dirigirá al usuario a la ventana
de login para que vuelva a validarse si quiere ver su página personal.
Si el usuario pretende entrar directamente a la página de contenido sin pasar previamente
por la ventana de login se le mostrará el formulario de login para que se valide.
Además la aplicación permitirá al usuario la modificación de sus datos de perfil (nombre de usuario, contraseña, correo electrónico y pintor
favorito). También podrá darse de baja de la aplicación.
La validación de todos los formularios (login, registro y perfil) serán
validados en el entorno del cliente mediante el uso de HTML5.*


Orientaciones:

El esquema de la base de datos se aporta con el enunciado.
Los documentos de diseño se aportan con el enunciado. Completar el diseño con la funcionalidad adicional no incluida en los
diagramas aportados.

1. Uso de construcciones OO
2. Uso de librería de acceso a datos en PHP PDO (PHP Data Objects)
3. Utilización del patron "active record" para hacer una implementación simple de la integración OO y relacional.
4. Patrón Modelo Vista Controlador
5. Utilización de sesiones PHP
6. Uso del Motor de Vistas Blade
7. Uso de espacios de nombres
8. Uso de la autocarga de Composer

