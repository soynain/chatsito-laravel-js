<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Inicio sesión</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white">Crud Productos</a>

        </div>
    </nav>

    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <form onsubmit="return validate(event)" method="post" class="login-cont" action="{{route('login.auth')}}">
            @csrf

            <label for="usuarioInput" class="form-label">Nombre de usuario: </label>
            <input name="usuario" type="text" class="form-control mb-3" id="usuarioInput" placeholder="Ingresa aquí tu usuario">
            <label for="contraInput" class="form-label">Contraseña: </label>
            <input name="contra" type="password" class="form-control mb-3" id="contraInput" placeholder="Ingresa aquí tu contraseña">
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
            <div class="text-bg-danger p-3 mt-3">Revise que sus credenciales estén correctas</div>
        </form>
    </div>

    <script>
        function validate(e) {
            //   e.preventDefault() se dedactiva esto porque si no, evitara enviar el form aunque sea true
            console.log('hola')
            const formData = new FormData(e.target); //se convierte el formulario a un formdata
            const formProps = Object.fromEntries(formData); //se pasa el formdata a objeto
            if (formProps.pss_vbl.length == 0 || formProps.us_vbl.length == 0) { //validación de campos
                let dangerNode = document.querySelector('.text-bg-danger')
                dangerNode.style.display = 'block';
                dangerNode.removeChild(dangerNode.firstChild)
                dangerNode.appendChild(document.createTextNode('No puede dejar los campos vacios'))
                return false;
            } else {
                /*   fetch('/crudmaestros/auth/login.php', {
                       method: 'POST', // or 'PUT'
                       body: formData, // data can be `string` or {object}!
                   }).then(res => console.log(res))
                       .catch(error => window.location.href='/crudmaestros/public/index.html')
                       .then(response => console.log('Success:', response))*/
                 
                return true;
            }

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
   
</body>

</html>