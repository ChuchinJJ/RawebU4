@extends('layouts.app')

@section('content')
<section class="seccion">
    <div class="form-row justify-content-center">
        <h1 class="col-md-6"><b>Mapa</b></h1>
        <div class="col-md-6">
            <a href="places" class="btn btn-lg btn-dark">Ir a Lugares Buscados</a> 
        </div>
    </div>
    <br>
    @if(count($lista)>0)
        <div id="map"></div>
        <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqA-vdjT2YOAs-7yeH_kcL1LBi7TTmnJg&callback=initMap">
        </script>
        
    @else
        <p>Lo sentimos, no se encontro ninguna coincidencia</p>
    @endif
</section>
@endsection
<script>
    let map;
    var lista = <?php echo json_encode($lista);?>;
    //console.log(lista[0]["nombre"]);
    if(lista.length > 0){
        function initMap() {
            var mapOptions = {
                center: new google.maps.LatLng(lista[0]["lat"],lista[0]["lon"]),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("map"),mapOptions);

            lista.forEach(function (lugar) {
                console.log(lugar);
                var place = new google.maps.LatLng(lugar["lat"],lugar["lon"]);
                    marker = new google.maps.Marker({
                    position: place,
                    title: lugar["nombre"],
                    map: map
                });            
            });
        }
    }
</script>