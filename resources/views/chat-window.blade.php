<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Chat con {username}</title>
    <style>
        .box-for-button {
            border-right: 0.5px solid gray;
            width: 15%;
        }

        .send-msg-container {
            height: 15%;
        }

        .bubble-style {
            background: linear-gradient(180deg, hsla(217, 100%, 50%, 1) 0%, hsla(186, 100%, 69%, 1) 100%);
        }

        .chat-view-main {
            height: 91.5vh;
        }
        .notification-icon {
            width: 25px;
            height: 25px;
        }

        .notification-box {
            left: 18%;
            z-index: 1;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary ps-4 pe-4">
        <div class="container-fluid">
            <a href="#" class="navbar-brand text-white">Chat en laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                        <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                            aria-controls="collapseExample"><img class="notification-icon"
                                src="../images/notification_received.png">
                        </a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2 me-2" type="search" placeholder="Buscar un perfil..."
                        aria-label="Search">
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
        <div class="messages-container w-100">
            <div class="d-flex flex-row w-100 justify-content-start p-2 left-bubble">
                <div class="card w-50 ms-3">
                    <div class="card-body">
                        <p class="card-text text-wrap text-break">With supporting text below as a natural
                            lead-in to additional content.</p>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row w-100 justify-content-end p-2 right-bubble">
                <div class="card w-50 me-3 bubble-style">
                    <div class="card-body">
                        <p class="card-text text-white text-wrap text-break">With supporting text below as a natural
                            lead-in to
                            additional content.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row send-msg-container w-100 card">
            <div class="box-for-button p-2 h-100 d-flex align-items-center">
                <button class="btn btn-primary h-100 w-100">
                    Enviar mensaje
                </button>
            </div>
            <div class="container-textarea w-100 h-100 p-2 d-flex align-items-center">
                <textarea placeholder="Escribe tu mensaje..." style="resize: none;"
                    class="h-100 w-100 form-control"></textarea>
            </div>
        </div>
    </div>

</body>

</html>