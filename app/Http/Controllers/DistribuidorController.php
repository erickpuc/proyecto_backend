<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distribuidor;

class DistribuidorController extends Controller
{


    public function getApiDistribuidor() {
        // Se usa el método all para obtener todos los formularios
        // "SELECT * FROM formularios"
         $distribuidor = Distribuidor::all();
        return ["distribuidor" => $distribuidor];
    }



     public function addDistribuidor(Request $request)
    {
        $data = $request->all();

        $distribuidor = new Distribuidor();

        $distribuidor->nombre = $data['nombre'];
        $distribuidor->rfc = $data['rfc'];
        $distribuidor->categoria = $data['categoria'];
        $distribuidor->contacto = $data['contacto'];
        $distribuidor->correo = $data['correo'];
        $distribuidor->telefono = $data['telefono'];
        $distribuidor->direccion = $data['direccion'];
        $distribuidor->entrega = $data['entrega'];
        $distribuidor->ciudad = $data['ciudad'];
        $distribuidor->pago = $data['pago'];

        $distribuidor->save();

        return response()->json([
            'message' => 'Distribuidor guardado con éxito',
            'id' => $distribuidor->id
        ], 201);
    }



        public function deleteDistribuidor($id) {
        // Se busca el registro de la tabla
        // "SELECT * FROM formularios WHERE id=1"
        $distribuidor = Distribuidor::find($id);
        // Se ejecuta el método delete
        // "DELETE FROM formularios WHERE id=1"
        $distribuidor->delete();
    }



    public function putApiUpdateDistribuidor($id, Request $request){
    $data = $request->all();

    $distribuidor = Distribuidor::find($id);
    $distribuidor->nombre = $data['nombre'];
    $distribuidor->rfc = $data['rfc'];
    $distribuidor->categoria = $data['categoria'];
    $distribuidor->contacto = $data['contacto'];
    $distribuidor->correo = $data['correo'];
    $distribuidor->telefono = $data['telefono'];
    $distribuidor->direccion = $data['direccion'];
    $distribuidor->entrega = $data['entrega'];
    $distribuidor->ciudad = $data['ciudad'];

    $distribuidor->save();

   return response()->json([
    'message' => 'Distribuidor actualizado correctamente',
    'distribuidor' => $distribuidor
]);
}
}
