@extends('master')
@section('content')
<form method="POST" action="index.php">
    <h2>Modificar datos</h2>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="{{$nombre}}" required /><br><br>
    <label for="contra">Contraseña:</label>
    <input type="password" id="contra" name="contra" value="{{$contra}}" required /><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{$email}}" required /><br><br>
    <label for="pintor">Pintor favorito:</label>
    <select id="pintor" name="pintor">
        @foreach ($pintores as $valor)
            @if ($valor == $pintor)
            <option value="{{$valor}}" selected>{{$valor}}</option>
            @else 
            <option value="{{$valor}}">{{$valor}}</option>
            @endif
        @endforeach
    </select><br><br>
    <button type="submit" id="confirmarmod" name="enviar" value="Confirmar Modificacion Datos">Confirmar modificación</button>
    <button type="submit" id="volver" name="enviar" value="Volver a Personal">Volver</button>
    @if (!empty($texto)) 
    <p>{{$texto}}</p>
    @endif
</form>
@endsection

