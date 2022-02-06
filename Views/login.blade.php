@extends('master')
@section('content')
<h2>Log in</h2>
<form method="POST" action="index.php">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required /><br><br>
    <label for="contra">Contraseña:</label>
    <input type="password" id="contra" name="contra" required /><br><br>
    <button type="submit" id="continuarlog" name="enviar" value="Confirmar Inicio Sesion">Continuar</button>
    @if (!empty($texto)) 
    <p>{{$texto}}</p>
    @endif
</form>
@endsection

