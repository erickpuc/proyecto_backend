<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planes;

class PlanesController extends Controller
{
   public function AddPlanes(Request $request){
    $data=$request->all();
    $planes = new Planes();

    $planes->nombre=$data['nombre'];
    $planes->precio=$data['precio'];
    $planes->duracion_dias=$data['duracion_dias'];
    $planes->save();
    return response()->json(["message" => "Plan creado correctamente","data" => $planes], 201);}
}
