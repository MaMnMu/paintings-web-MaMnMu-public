@extends('master')
@section('content')
<h2>Pagina personal de {{$nombre}}</h2>
<form action="index.php" method="POST">
    <h3>{{$cuadros[0]['title']}}</h3>
    <button type="submit" id="info1" name="enviar" value="Ver Cuadro 1">Más información</button>
    <h3>{{$cuadros[1]['title']}}</h3>
    <button type="submit" id="info2" name="enviar" value="Ver Cuadro 2">Más información</button>
    <h3>{{$cuadros[2]['title']}}</h3>
    <button type="submit" id="info3" name="enviar" value="Ver Cuadro 3">Más información</button>
    <br><br><button type="submit" id="modificar" name="enviar" value="Modificar Datos">Modificar datos</button>
    <button type="submit" id="logout" name="enviar" value="Cerrar Sesion">Cerrar sesión</button>
    <button type="submit" id="darbaja" name="enviar" value="Dar de Baja">Dar de baja</button>
    @if (!empty($texto)) 
    <p>{{$texto}}</p>
    @endif
</form>
@endsection