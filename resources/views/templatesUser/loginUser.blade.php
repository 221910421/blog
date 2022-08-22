<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} iniciar sesión</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    <p>{{ $message }}</p>
    <form action="{{ route('login-user') }}" method="POST">
        {{ csrf_field() }}
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" required value="{{ old('username') }}"><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Iniciar sesión">
</html>
