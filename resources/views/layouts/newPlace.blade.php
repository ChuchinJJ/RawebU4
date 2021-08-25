@extends('layouts.app')

@section('content')
<section class="seccion">
    <center><h1><b>Buscar lugares cercanos</b></h1></center>
    <br>

    <form id="formulario" action="setplace" method="POST">
        @csrf
        <div class="form-row justify-content-center">
            <div class="form-group col-md-5">
                <label for="formGroupExampleInput">Busqueda</label>
                <input type="text" name="busqueda" class="form-control" placeholder="Ingrese una busqueda relacionada al lugar" />
            </div>
            <div class="form-group col-md-3">
                <label for="formGroupExampleInput">Tipo</label>
                <select name="tipo" class="form-control">
                    <option value="restaurant">Restaurante</option>
                    <option value="hospital">Hospital</option>
                    <option value="library">Biblioteca</option>
                    <option value="airport">Aereopuerto</option>
                    <option value="museum">Museo</option>
                    <option value="bank">Banco</option>
                    <option value="cafe">cafe</option>
                    <option value="park">Parque</option>
                    <option value="church">Iglesia</option>
                    <option value="dentist">Dentista</option>
                    <option value="school">Escuela</option>
                    <option value="store">Tienda</option>
                    <option value="supermarket">supermercado</option>
                    <option value="gym">Gimnasio</option>
                </select>
            </div>
        </div>
        <br>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-3">
                <label for="formGroupExampleInput">Latitud</label>
                <input type="text" name="lat" class="form-control" placeholder="Ingrese su latitud" />
            </div>
            <div class="form-group col-md-3">
                <label for="formGroupExampleInput">Longitud</label>
                <input type="text" name="lon" class="form-control" placeholder="Ingrese su longitud" />
            </div>
        </div>
        <br>
        <center>
            <button type="submit" class="btn btn-lg btn-dark">Enviar</button>
        </center>
        </div>
    </form>
</section>

@endsection