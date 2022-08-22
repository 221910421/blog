<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <h1>Crear Usuario</h1>
    <P>{{ $message }}</p>
    <form action="{{ route('save-user') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required value="{{ old('name') }}"><br>
        <label for="lastname">Apellido:</label>
        <input type="text" name="lastname" id="lastname" required value="{{ old('lastname') }}"><br>
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" required value="{{ old('username') }}"><br>
        <label type="birthdate">Fecha de nacimiento:</label>
        <input type="date" name="birthday" id="birthday" required value="{{ old('birthday') }}"><br>
        <label for="photo">Foto:</label>
        <input type="file" name="photo" id="photo"><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required value="{{ old('email') }}"><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Crear Usuario">
    </form>
</body>
