<?php

namespace App\Http\Controllers;
use App\Models\Places;

use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $places = Places::all();
        return view('layouts.places')->with('lista', $places);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.newPlace');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
                $mensaje[$count] = array("nombre"=>$name,"lat"=>$lat,"lon"=>$lon);
            } 
            $count++;
        }
        return view('layouts.mapa')->with('lista', $mensaje);
    }

    public function mapa(){
        return view('layouts.mapa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
