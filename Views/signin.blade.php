@extends('master')
@section('content')
<h2>Sign in</h2>
<form method="POST" action="index.php">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required /><br><br>
    <label for="contra">Contraseña:</label>
    <input type="password" id="contra" name="contra" required /><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required /><br><br>
    <label for="pintor">Pintor favorito:</label>
    <select id="pintor" name="pintor">
        @foreach ($pintores as $pintor)
        <option value="{{$pintor}}">{{$pintor}}</option>
        @endforeach
    </select><br><br>
    <button type="submit" id="continuarsign" name="enviar" value="Confirmar Registro">Continuar</button>
    @if (!empty($texto)) 
    <p>{{$texto}}</p>
    @endif
</form>
@endsection

