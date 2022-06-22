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
            <span class="d-flex align items-center card-text">{{$mensajesdetalleslista[0]->destinatario}}</span>
            <div class="d-flex justify-content-between align-items-center">
                <span class="d-flex justify-content-center align-items-center me-1 card-text">En línea</span>
                <div class="online-circle"></div>
            </div>
        </div>
        <div class="messages-container w-100 h-100" style="overflow: auto;scroll-snap-align: end;">
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
                <button class="btn btn-primary h-100 w-100">
                    Enviar mensaje
                </button>
            </div>
            <div class="container-textarea w-100 h-100 p-2 d-flex align-items-center">
                <textarea placeholder="Escribe tu mensaje..." style="resize: none;" class="h-100 w-100 form-control"></textarea>
            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        let idSala='{{$mensajesdetalleslista[0]->idConversaciones}}'
        window.Echo.private(`ChatListener.${idSala}`).listen('ChatSupervisor',(e)=>{
            console.log(e);
        });
    </script>
</body>

</html>