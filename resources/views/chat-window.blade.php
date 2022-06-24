<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Chat con {username}</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary ps-4 pe-4">
        <div class="container-fluid">
            <a href="/v1/panel-principal" class="navbar-brand text-white">Chat en laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="d-flex flex-row align-items-center navbar-nav navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Mi perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Cerrar sesión</a>
                    </li>
                    <li class="nav-item d-lg-none d-md-none d-sm-block">
                        <a class="nav-link text-white" href="#">Ver chats</a>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><img class="notification-icon" src="{{asset('img/notification_received.png')}}">
                        </a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2 me-2" type="search" placeholder="Buscar un perfil..." aria-label="Search">
                    <button class="btn btn-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="collapse position-absolute w-25 notification-box" id="collapseExample">
        <div class="card card-body filas-notificacion">
            <div class="card filas">
                <div class="card-body">
                    <p class="card-text">
                        <span class="text-wrap text-break"><b>Nombre de usuario</b> quiere ser tu amigo</span>
                    </p>
                    <d class="buttons">
                        <button class="btn btn-success">Aceptar</button>
                        <button class="btn btn-danger">Rechazar</button>
                    </d>
                </div>
            </div>
        </div>
        <div class="card card-body filas-notificacion">
            <div class="card filas">
                <div class="card-body">
                    <p class="card-text">
                        <span class="text-wrap text-break"><b>Nombre de usuario</b> quiere ser tu amigo</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="chat-view-main d-flex flex-column justify-content-between align-items-center">
        <div class="w-100 p-3 destinatario-box d-flex flex-row justify-content-between align-items-center">
            <span class="d-flex align items-center card-text nombre-usuario">
                @if($mensajesdetalleslista[0]->destinatario===Auth::user()->usuario)
                {{$mensajesdetalleslista[0]->remitente}}
                @else
                {{$mensajesdetalleslista[0]->destinatario}}
                @endif
            </span>
            <div class="d-flex justify-content-between align-items-center">
                <span class="d-flex justify-content-center align-items-center me-1 card-text status-text">Desconectado</span>
                <div class="offline-circle"></div>
            </div>
        </div>
        <div class="messages-container w-100 h-100 d-flex flex-column-reverse">
            <div class="scroll-chat">
                @foreach($mensajesdetalleslista as $lista)
                @if($lista->remitente==Auth::user()->usuario)
                <div class="d-flex flex-row w-100 justify-content-end p-2 right-bubble">
                    <div class="card w-50 me-3 bubble-style">
                        <div class="card-body">
                            <p class="card-text text-white text-wrap text-break">{{$lista->mensaje}}</p>
                        </div>
                    </div>
                </div>
                @else
                <div class="d-flex flex-row w-100 justify-content-start p-2 left-bubble">
                    <div class="card w-50 ms-3">
                        <div class="card-body">
                            <p class="card-text text-wrap text-break">{{$lista->mensaje}}</p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="d-flex flex-row send-msg-container w-100 card">
            <div class="box-for-button p-2 h-100 d-flex align-items-center">
                <button class="btn btn-primary h-100 w-100 send-msg-btn">
                    Enviar mensaje
                </button>
            </div>
            <div class="container-textarea w-100 h-100 p-2 d-flex align-items-center">
                <textarea placeholder="Escribe tu mensaje..." style="resize: none;" class="h-100 w-100 form-control msg-content"></textarea>
            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        let nombreusuario = document.querySelectorAll('.nombre-usuario')[0];
        let statustexto = document.querySelectorAll('.status-text')[0];
        let circlestatus = document.querySelectorAll('.offline-circle')[0];
        window.Echo.join(`tablon.1234`).here((usuarios) => {
            for (let i = 0; i < usuarios.length; i++) {
                //si los usuarios que ya estan en la sala son mis amigos, entran al sig for 
                if (nombreusuario.textContent.trim() === usuarios[i]) {
                    statustexto.innerText = "En línea";
                    circlestatus.removeAttribute('class', 'offline-circle');
                    circlestatus.setAttribute('class', 'online-circle');
                }
            }
        }).leaving((usuario) => {
            /*Hago una conexión desde el leaving hacia el panel principal
            para seguir detectando si el usuario sigue en linea, independientemente
            de si salio o no de la ventana del chat, creo para esto
            si o si necesito un socket, perooo aun asi tendria
            que arreglarmelas para seguir detectando la conexión
            desde otros archivos html*/
            window.Echo.join(`tablon.1234`)
                .leaving((usuario) => {
                    if (usuario === nombreusuario.textContent.trim()) {
                        statustexto.innerText = "Desconectado";
                        circlestatus.removeAttribute('class', 'online-circle');
                        circlestatus.setAttribute('class', 'offline-circle');
                    }
                })
        }).joining((usuario) => {
            if (nombreusuario.textContent.trim() === usuario) {
                statustexto.innerText = "En línea";
                circlestatus.removeAttribute('class', 'offline-circle');
                circlestatus.setAttribute('class', 'online-circle');
            }
        })
    </script>
    <script>
        console.time('benchmarking');
        /*obtenemos el id de la sala para unirnos a la sala de chat privada
        entre dos usuarios solamente, asi como tambien obtendremos el boton
        de enviar mensaje para su listener de enviar, el contenedor para
        añadirle mas burbujas y el campo de texto para obtener
        su valor y limpiarlo*/
        let idSala = '{{$mensajesdetalleslista[0]->idConversaciones}}';
        const btnSendMessage = document.getElementsByClassName('send-msg-btn')[0];
        let containerForMessageBubbles = document.getElementsByClassName('scroll-chat')[0];
        let messageContentFromRemitent = document.getElementsByClassName('msg-content')[0];

        /*Creando los componentes básicos para las burbujas del chat*/
        function getBubbleComponentsArray() {
            let newMsgBubbleForRemitent = document.createElement('div');
            let cardContainerForBubbleMsg = document.createElement('div');
            let cardBodyForBubbleMsg = document.createElement('div');
            let cardTextForBubbleMsg = document.createElement('p');
            return {
                newMsgBubbleForRemitent: newMsgBubbleForRemitent,
                cardContainerForBubbleMsg: cardContainerForBubbleMsg,
                cardBodyForBubbleMsg: cardBodyForBubbleMsg,
                cardTextForBubbleMsg: cardTextForBubbleMsg
            };
        }

        /*funcion para crear la burbuja derecha (remitente) */
        function createRightBubbleForRemitent(message) {
            let componentsGeneratedArray = getBubbleComponentsArray();

            componentsGeneratedArray['cardTextForBubbleMsg'].classList.add('card-text', 'text-white', 'text-wrap', 'text-break');
            componentsGeneratedArray['cardBodyForBubbleMsg'].classList.add('card-body');
            componentsGeneratedArray['cardContainerForBubbleMsg'].classList.add('card', 'w-50', 'me-3', 'bubble-style');
            componentsGeneratedArray['newMsgBubbleForRemitent'].classList.add('d-flex', 'flex-row', 'w-100', 'justify-content-end', 'p-2', 'right-bubble');

            componentsGeneratedArray['cardTextForBubbleMsg'].innerText = message;
            componentsGeneratedArray['cardBodyForBubbleMsg'].appendChild(componentsGeneratedArray['cardTextForBubbleMsg']);
            componentsGeneratedArray['cardContainerForBubbleMsg'].appendChild(componentsGeneratedArray['cardBodyForBubbleMsg']);
            componentsGeneratedArray['newMsgBubbleForRemitent'].appendChild(componentsGeneratedArray['cardContainerForBubbleMsg']);
            containerForMessageBubbles.appendChild(componentsGeneratedArray['newMsgBubbleForRemitent']);
        }

        /*funcion para crear la burbuja izquierda (destinatario) */
        function createLeftBubbleForDestination(message) {
            let componentsGeneratedArray = getBubbleComponentsArray();

            componentsGeneratedArray['cardTextForBubbleMsg'].classList.add('card-text', 'text-wrap', 'text-break');
            componentsGeneratedArray['cardBodyForBubbleMsg'].classList.add('card-body');
            componentsGeneratedArray['cardContainerForBubbleMsg'].classList.add('card', 'w-50', 'ms-3');
            componentsGeneratedArray['newMsgBubbleForRemitent'].classList.add('d-flex', 'flex-row', 'w-100', 'justify-content-start', 'p-2', 'left-bubble');

            componentsGeneratedArray['cardTextForBubbleMsg'].innerText = message;
            componentsGeneratedArray['cardBodyForBubbleMsg'].appendChild(componentsGeneratedArray['cardTextForBubbleMsg']);
            componentsGeneratedArray['cardContainerForBubbleMsg'].appendChild(componentsGeneratedArray['cardBodyForBubbleMsg']);
            componentsGeneratedArray['newMsgBubbleForRemitent'].appendChild(componentsGeneratedArray['cardContainerForBubbleMsg']);
            containerForMessageBubbles.appendChild(componentsGeneratedArray['newMsgBubbleForRemitent']);
        }

        /*Listener para unirnos al canal privado entre dos usuarios que
        sean amigos, consulte https://github.com/laravel/framework/issues/15466
        para visualizar de donde pude obtener el Echo.socketId(), ya que no viene
        predefinido por defecto como lo indica los docs*/
        const pusher = window.Echo.private(`ChatListener.${idSala}`).listen('ChatSupervisor', (e) => {
            if (e !== null) {
                createLeftBubbleForDestination(e.mensaje);
                containerForMessageBubbles.scrollIntoView({
                    behavior: 'smooth',
                    block: 'end'
                });
            }
        });

        /*Parecido a la funcion nativa de js de websockets, usamos el on
        para que en base al estatus de subscripción, declaremos
        los listeners y el ajax del chat con el socketId()
        obtenido.*/
        pusher.on('pusher:subscription_succeeded', function() {
            var socket_id = Echo.socketId();

            async function dispararEvento(msg) {
                const response = await fetch('/v1/send-message', {
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': window.axios.defaults.headers.common['X-CSRF-TOKEN'],
                        'Content-type': 'application/json',
                        'X-Socket-Id': socket_id
                    },
                    body: JSON.stringify({
                        mensaje: msg,
                        idConversaciones: '{{$mensajesdetalleslista[0]->idConversaciones}}',
                        idRemitente: '{{Auth::user()->id}}'
                    })
                })
                const res = response.json();
                return res;
            }

            /*Listener para enviar mensajes con enter */
            messageContentFromRemitent.addEventListener('keypress', (event) => {
                if (event.key === "Enter") {
                    event.preventDefault();
                    dispararEvento(messageContentFromRemitent.value).then((asyncresp) => {
                        if (asyncresp.response === 'ok') {
                            createRightBubbleForRemitent(messageContentFromRemitent.value);
                        } else {
                            createRightBubbleForRemitent('No se puso enviar su mensaje');
                        }
                        messageContentFromRemitent.value = "";
                    });
                }
            });

            /*Listener para enviar mensajes con el boton enviar mensaje*/
            btnSendMessage.addEventListener('click', () => {
                dispararEvento(messageContentFromRemitent.value).then((asyncresp) => {
                    if (asyncresp.response === 'ok') {
                        createRightBubbleForRemitent(messageContentFromRemitent.value);
                    } else {
                        createRightBubbleForRemitent('No se puso enviar su mensaje');
                    }
                    messageContentFromRemitent.value = "";
                });
            });
        })
        console.timeEnd('benchmarking');
    </script>
</body>

</html>