<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Panel principal</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary ps-4 pe-4">
        <div class="container-fluid">
            <a href="#" class="navbar-brand text-white">Chat en laravel</a>
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
                    <d class="buttons">
                        <button class="btn btn-success">Aceptar</button>
                        <button class="btn btn-danger">Rechazar</button>
                    </d>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-row w-100" style="height: 91.5vh;">
        <div class="container-chat-collapser d-sm-none d-md-flex d-lg-flex flex-column-reverse w-25">
            <div onclick="mostrarContactos()" class="toggler-chat d-flex flex-row justify-content-between align-items-center w-100 p-2">
                <span class="contacts-label">Contactos</span>
                <img src="{{asset('img/upload.png')}}" style="width:20px; height:20px;">
            </div>
            <div class="list-group w-100 overflow-auto">
                @foreach($contactoschatvar as $fila)
                <a href="#" class="list-group-item d-flex justify-content-between align-items-center amigoscont">
                    <span class="text-wrap text-break hover-send-msg">{{$fila->amigosAQuienesMandeSoli}}</span>
                    <div class="offline-circle"></div>
                </a>
                @endforeach
            </div>
            <div></div>
        </div>

        <div class="feed-body d-flex flex-column justify-content-center align-items-center w-100">
            <h2>Aquí irá proximamente ubicado, el feed de publicaciones</h2>
            <h4>Mantenerse al pendiente de los proximos commits</h4>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="{{asset('js/contact-toggler.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript">
        let miUsuario = "{{Auth::user()->usuario}}"
        let filaamigochat = document.body.querySelectorAll(".amigoscont");
        let arregloNombresAmigos = "<?php
                                    foreach ($contactoschatvar as $fila) {
                                        echo (string)$fila->amigosAQuienesMandeSoli . ",";
                                    }
                                    ?>".split(",");
        //console.log(arregloNombresAmigos);
        window.Echo.join(`tablon.1234`).here((usuarios) => {
     //       console.log(usuarios[0], " yo estoy aqui")
            for (let i = 0; i < usuarios.length; i++) {
                /*si los usuarios que ya estan en la sala son mis amigos, entran al sig for */
                if (arregloNombresAmigos.includes(usuarios[i])) {
                    for (let index = 0; index < filaamigochat.length; index++) {
                        //console.log(filaamigochat[index].firstElementChild.textContent, " for de divs", usuarios[i], " comparador")
                        /*si el texto de un nodo htmo corresponde con el elemento del for principal, el amigo esta online*/
                        if (filaamigochat[index].firstElementChild.textContent === usuarios[i]) {
                            filaamigochat[index].lastElementChild.setAttribute('class', 'online-circle')
                            break;
                        }
                    }
                }
            }
        }).leaving((usuario) => {
     //       console.log(usuario, " dejando")
            for (let index = 0; index < filaamigochat.length; index++) {
                console.log(filaamigochat[index].firstElementChild.textContent)
                if (filaamigochat[index].firstElementChild.textContent === usuario) {
                    filaamigochat[index].lastElementChild.setAttribute('class', 'offline-circle')
                    break;
                }
            }
        }).joining((usuario) => {
    //        console.log(usuario, " uniendome")
            if (arregloNombresAmigos.includes(usuario)) {
                for (let index = 0; index < filaamigochat.length; index++) {
                    console.log(filaamigochat[index].firstElementChild.textContent)
                    if (filaamigochat[index].firstElementChild.textContent === usuario) {
                        filaamigochat[index].lastElementChild.setAttribute('class', 'online-circle')
                        break
                    }
                }
            }
        })


        /*   async function dispararEvento() {
               const response = await fetch('/v1/consulta-conectados', {
                   method: 'post',
                   headers: {
                       'X-CSRF-TOKEN': window.axios.defaults.headers.common['X-CSRF-TOKEN']
                   }
               })

           }
           dispararEvento();*/
    </script>

</body>

</html>