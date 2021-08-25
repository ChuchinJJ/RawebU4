@extends('layouts.app')

@section('content')
<section class="seccion">
    <center><h1><b>Lugares Buscados</b></h1></center>
    <br>
    @if(count($lista)>0)
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Busqueda</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Tipo</th>
                    <th>Valoración</th>
                </tr>
            </thead>
            <tbody>
            @foreach($lista as $place)
                <tr>
                    <td>{{$place->busqueda}}</td>
                    <td>{{$place->lat}}</td>
                    <td>{{$place->lon}}</td>
                    <td>{{$place->nombre}}</td>
                    <td>{{$place->ubicacion}}</td>
                    <td>{{$place->tipo}}</td>
                    <td>{{$place->valoracion}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No existe ningun registro</p>
    @endif
</section>
@endsection
