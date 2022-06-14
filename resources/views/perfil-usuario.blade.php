<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Nombre completo del perfil</title>

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
                        <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><img class="notification-icon" src="../images/notification_received.png">
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

    <div class="container-fluid d-flex justify-content-center align-items-center cont-principal">
        <div class="card w-50">
            <div class="card-header d-flex flex-row justify-content-between align-items-center">
                <h5>Perfil</h5>
                <a class="d-flex flex-row justify-content-between align-items-center text-white btn btn-success" href="/enviar-solicitud">
                    <img class="icon-friend-status me-1" src="../images/add-friend.png">
                    Enviar solicitud de amistad
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Gebel Zyat</h5>
                <div class="container">
                    <div class="row cont-de-datos">
                        <div class="col-sm d-flex flex-column primer-apartado">
                            <div class="mb-3">
                                <dt class="me-1">Nombre: </dt><span class="text-wrap text-break">Moisés Nain Soto Guzmán
                                    Magallan</span>
                            </div>
                            <div class="mb-3">
                                <dt class="me-1">Edad: </dt><span class="text-wrap text-break">15 años</span>
                            </div>
                            <div class="mb-0">
                                <dt class="me-1">Oficio: </dt><span class="text-wrap text-break">Albañil</span>
                            </div>
                        </div>
                        <div class="col-sm d-flex flex-column segundo-apartado">
                            <div class="mb-3">
                                <dt class="me-1">Estado: </dt><span class="text-wrap text-break">Veracruz</span>
                            </div>
                            <div class="mb-3">
                                <dt class="me-1">Ciudad: </dt><span class="text-wrap text-break">Xalapa</span>
                            </div>
                            <div class="mb-0">
                                <dt class="me-1">Estado civil: </dt><span class="text-wrap text-break">Casado</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>