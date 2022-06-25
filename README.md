## Laravel Chat Project
For foreignian speakers, I made a video speaking english to explain this proyect, my speaking
is very poor but understandable hehe, check it out!! 
https://www.youtube.com/watch?v=tGy2cGSvE_8

## Proyecto de chat

Este proyecto de laravel consistirá en un sistema de chat sencillo para comunicar a dos usuarios entre si, no planeo que sea un chat generico de una sala para todos.

¿Caracteristicas?

- Los usuarios pueden enviarse solicitudes entre si.
- Un usuario podrá buscar a otros usuarios.
- Solo los usuarios que sean amigos podrán enviarse mensajes en tiempo real con los sockets.
- Si un usuario no está conectado, tales mensajes se almacenaran en la bdd y el otro usuario
al conectarse de nuevo podrá ver los nuevos mensajes.

No planeo añadir más caracteristicas complejas por flojera, y porque tampoco soy tan
"open source mind" jajajajaja


## Modelo de base de datos
Usaré MYSQL para la base de datos, nada fuera de lo común, se que es común usar NoSQL (mongo)
para tales cuestiones pero quiero practicar mis habilidades de maquetado también. Y también
ya hasta se me olvidó como usar mongo por guebon.
[![laravelchatbdd-V2.png](https://i.postimg.cc/k5FsBf27/laravelchatbdd-V2.png)](https://postimg.cc/5HyLr55r)

## Capturas de pantalla
Login chat: (valida las credenciales en el servidor, si no existe no se loguea, y los campos son obligatorios, te lo dice el mismo boostrap, eso si me falto
mas validaciones, pero funciona vaya)
![image](https://user-images.githubusercontent.com/78714792/175756951-a9c7b93b-4ba5-47ff-9cfc-77b36e3215a3.png)

Panel principal: aquí el usuario puede ver su lista de contactos, y hasta ocultar la lista así tipo fb, 
la lista de contactos cambiará de estatus conforme alguien de su lista de amigos se conecta a su cuenta,
también cuenta con una caja de notificaciones
![image](https://user-images.githubusercontent.com/78714792/175757016-d549ae0e-76da-43f6-a68d-6808d6ffb9d1.png)
![image](https://user-images.githubusercontent.com/78714792/175757020-c30163dd-7a07-47dc-ac03-0e4cff60d37d.png)

Mi perfil: el usuario puede visualizar su perfil con sus datos, está muy sencillo el diseño, pero en esta practica
le di mas prioridad a dominar el broadcasting que a diseñar todo el sistema, puede ser escalado claro
![image](https://user-images.githubusercontent.com/78714792/175757056-950b6819-0e6a-42e1-a02c-41388dbde675.png)

Ventana chat: aquí el usuario podrá ver la lista de mensajes que se ha intercambiado con su respectivo contacto,
solo puede enviar texto en esta práctica, puede ser escalado igual para enviar imagenes o emojis, el cascaron de 
todo el proyecto se presta a poder ser mejorado.
![image](https://user-images.githubusercontent.com/78714792/175757102-6aa7f45c-5870-420b-9aee-d458850e46de.png)

Si dos amigos están conectados, independientemente de en que interfaz del sitio web se encuentren,
podrán ver su estado en línea, siempre y cuando los dos hayan iniciado sesión y estén presentes en el sistema, 
aquí en la siguiente captura se ve su estatus offline
![image](https://user-images.githubusercontent.com/78714792/175757140-06fb44f2-5bd4-49e2-a09b-31067a559a55.png)

En la siguiente captura se podrá visualizar como si se inicia otra instancia limpia del explorador
e iniciamos sesión en la cuenta de algún amigo del usuario, se refleja su estatus en linea cambiando
el color del circulo de gris a verde, y el label de "Desconectado" a "En línea".
![image](https://user-images.githubusercontent.com/78714792/175757196-435e76d2-dbc9-4cbe-848e-12188980154e.png)
![image](https://user-images.githubusercontent.com/78714792/175757208-1e30d246-e598-44fc-8a16-41f984ed5c8d.png)

Y logicamente el chat es 100% funcional, si un usuario le envia un mensaje
a su respectivo amigo, este lo recibirá en "tiempo real", y también
detectará si se desconecta del sistema.
![image](https://user-images.githubusercontent.com/78714792/175757318-b1413e52-5cb8-4685-a467-0cb9502827a6.png)
![image](https://user-images.githubusercontent.com/78714792/175757340-b16c03a8-590c-4bfa-8bcc-c4636f6959d3.png)

Incluiré el dump de la base de datos en los archivos del proyecto para
que puedan probarlo, y mejorarlo de acuerdo
a sus necesidades, está sencillo y puede ser mejorado, pero
que pereza también.
