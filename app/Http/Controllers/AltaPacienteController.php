<?php

namespace App\Http\Controllers;
use App\Models\Paciente;
use App\Models\AltaPaciente;
use Illuminate\Http\Request;

class AltaPacienteController extends Controller
{
     public function getApiPaciente() {
     // Se usa el método all para obtener todos los formularios
     // "SELECT * FROM formularios"
    $paciente = AltaPaciente::all();
    return ["paciente" => $paciente];
    }


    public function addPaciente(Request $request){
    $data = $request->all();

    $paciente = new AltaPaciente();

    $paciente->nombre = $data['nombre'];
    $paciente->apellidoP = $data['apellidoP'];
    $paciente->apellidoM = $data['apellidoM'];
    $paciente->nacimiento = $data['nacimiento'];
    $paciente->genero = $data['genero'];
    $paciente->telefono = $data['telefono'];
    $paciente->correo = $data['correo'];
    $paciente->direccion = $data['direccion'];
    $paciente->colonia = $data['colonia'];
    $paciente->ciudad = $data['ciudad'];
    $paciente->estado = $data['estado'];
    $paciente->codigoPostal = $data['codigoPostal'];
    $paciente->tipoSangre = $data['tipoSangre'];
    $paciente->alergias = $data['alergias'];
    $paciente->padecimientoHeredofamiliar = $data['padecimientoHeredofamiliar'];

    $paciente->save();

    return response()->json([
        "message" => "Paciente guardado",
        "id" => $paciente->id
    ]);
}

}
