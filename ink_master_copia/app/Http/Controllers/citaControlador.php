<?php

namespace App\Http\Controllers;
use App\Models\clienteModelo;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class citaControlador extends Controller
{
    public function listar (){
        $cita = citaModelo::all();
        if ($cita ->isEmpty()){
            $data=[
                'message'=>'No hay citas registrados',
                'status'=>200
            ];
            return response()->json($data,404);
        }
        return response()->json($cliente,200);
    }

    //agregar cita
    public function agregar(Request $request){
        $validacion=Validator::make($request->all(),
        [
            'idCliente'=>'Required|numeric',
            'correoCliente'=>'Required|email',
            'nombreCliente'=>'Required|min:2|max:40',
            'apellidoCliente'=>'Required|min:2|max:40',
            'telefonoCliente'=>'Required|min:2|max:15',
            'contrasenaCliente'=>'Required|min:5|max:20'
        ]);
        if($validacion->fails()){
            $data=[
                'message'=>'Error en la validacion de datos',
                'errors'=>$validacion->errors(),
                'status'=>200
            ];
            return response()->json($data,400);
        }

        $cita = citaModelo::create(
            [
                'idCliente'=>$request->idCliente,
                'fechaCita'=>$request->correoCliente,
                'horaCita'=>$request->nombreCliente,
                'apellidoCliente'=>$request->apellidoCliente,
                'telefonoCliente'=>$request->telefonoCliente,
                'contrasenaCliente'=>Hash::make($request->contrasenaCliente)
            ]
        );

        if(!$cliente){
            $data=[
                'message'=>'Error al registrar el cliente',
                'status'=>500
            ];
            return response()->json($data,500);
        }
        $data=[
            'cliente'=>$cliente,
            'status'=>201
        ];
        return response()->json($data,201);
    }
}
