@extends('master')
@section('content')
<form action="index.php" method="POST">
    <h3>Titulo: {{$cuadro['title']}}</h3>
    <p>Descripción: {{$cuadro['description']}}</p>
    <p>Año: {{$cuadro['year']}}</p>
    <button type="submit" id="volver" name="enviar" value="Volver a Personal">Volver</button>
</form>
@endsection