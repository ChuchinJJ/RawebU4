<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Places;

class RESTController extends Controller
{

    public function index(Request $request)
    {
        if($request->user() != null){
            return Places::all();
        }
        return "[]";
    }

    public function create()
    {
       
    }

    public function store(Request $request)
    {   
        if($request->user() != null){
            $busqueda = $request->input('busqueda')!=null?$request->input('busqueda'):'';
            $lat_orig = $request->input('lat')!=null?$request->input('lat'):'';
            $lon_orig = $request->input('lon')!=null?$request->input('lon'):'';
            $tipo = $request->input('tipo')!=null?$request->input('tipo'):'';

            $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=".$lat_orig.",".$lon_orig."&radius=500&type=".$tipo."&keyword=".$busqueda."&key=AIzaSyCffq_LP_SdCi6Y_skJDw9mUPd4c6ab57E";

            $respuesta = file_get_contents($url);
            $json = json_decode($respuesta);
            $results = $json->{"results"};

            $mensaje = array();
            $count = 0;

            foreach ($results as $valor) {
                $place = new Places();
                $place->busqueda = $request->input('busqueda')!=null?$request->input('busqueda'):$place->busqueda;
                $place->tipo = $request->input('tipo')!=null?$request->input('tipo'):$place->tipo;
                $lat = $valor->{"geometry"}->{"location"}->{"lat"};
                $lon = $valor->{"geometry"}->{"location"}->{"lng"};
                $name = $valor->{"name"};
                $rating = $valor->{"rating"};
                $vicinity = $valor->{"vicinity"};
                $place->lat = $lat;
                $place->lon = $lon;
                $place->nombre = $name;
                $place->ubicacion = $vicinity;
                $place->valoracion = $rating;
                if($place->save()){
                    $mensaje[$count] = '{"mensaje":"OK","id":"'.$place->id.'"}';
                }else{
                    $mensaje[$count] = '{"mensaje":"Busqueda no registrada"}';
                } 
                $count++;
            }

            return $mensaje;
        }
        return "[]";
    }

    public function show(Request $request)
    {
        if($request->user() != null){
            return Places::find($request->input('id'));
        }
        return "[]";
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
