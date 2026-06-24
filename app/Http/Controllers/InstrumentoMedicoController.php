<?php

namespace App\Http\Controllers;

use App\Models\InstrumentoMedico;
use Illuminate\Http\Request;

class InstrumentoMedicoController extends Controller
{
    public function index()
{
    return InstrumentoMedico::all();
}

    public function store(Request $request)
    {
        $instrumento = InstrumentoMedico::create(
            $request->all()
        );

        return response()->json([
            "success"=>true,
            "instrumento"=>$instrumento
        ]);
    }

    public function update(Request $request,$id)
    {
        $instrumento =
        InstrumentoMedico::findOrFail($id);

        $instrumento->update(
            $request->all()
        );

        return response()->json([
            "success"=>true
        ]);
    }

    public function destroy($id)
    {
        InstrumentoMedico::destroy($id);

        return response()->json([
            "success"=>true
        ]);
    }
}