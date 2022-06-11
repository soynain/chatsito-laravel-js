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

<p align="center"><a href="" target="_blank"><img src="laravelchatbdd-V2.png" width="400"></a></p>

