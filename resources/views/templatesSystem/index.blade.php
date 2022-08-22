<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <h1>Opciones:</h1>
    @if (!empty(session('sessionUser')))
        <p>Bienvenido {{ session('sessionName') }} {{ session('sessionLastname') }}</p>
        <a href="">Publicar</a><br>
        <a href="{{ route('logout-user') }}">Cerrar sesión</a>
    @else
    <a href="{{ route('create-user') }}">Crear usuario</a>
    <a href="{{ route('login-page') }}">Iniciar sesión</a>
    @endif
</body>

</html>
