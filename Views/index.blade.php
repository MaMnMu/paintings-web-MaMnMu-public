@extends('master')
@section('content')
<form action="index.php" method="POST">
    <button type="submit" id="login" name="enviar" value="Iniciar Sesion">Log in</button><br><br>
    <button type="submit" id="signin" name="enviar" value="Registro">Sign in</button>
    @if (!empty($texto)) 
        <p>{{$texto}}</p>
    @endif
</form>
@endsection

