<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
   public function index()
{
    return Habitacion::all();
}

    public function store(Request $request)
    {
        $habitacion = Habitacion::create(
            $request->all()
        );

        return response()->json([
            "success"=>true,
            "habitacion"=>$habitacion
        ]);
    }

    public function update(Request $request,$id)
    {
        $habitacion = Habitacion::findOrFail($id);

        $habitacion->update(
            $request->all()
        );

        return response()->json([
            "success"=>true
        ]);
    }

    public function destroy($id)
    {
        Habitacion::destroy($id);

        return response()->json([
            "success"=>true
        ]);
    }
}