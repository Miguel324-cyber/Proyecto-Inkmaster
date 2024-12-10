<?php

namespace App\Http\Controllers;
use App\Models\clienteModelo;
use App\Models\empleadoModelo;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class loginControlador extends Controller
{
    public function login(Request $request){

        $correo = $request -> input('correo');
        $contrasena = $request -> input('contrasena');

        $cliente = clienteModelo::where('correoCliente',$correo)->first();
        if ($cliente && Hash::check($contrasena, $cliente->contrasenaCliente)){
            $token = JWTAuth::fromUser($cliente);
            $data=[
            'message'=>'Incio de sesion exitoso',
            'token'=> $token,
            'tipo'=> 'cliente',
            'cliente'=>$cliente,
            'status'=>200
            ];
            return response()->json($data,200);
        }

        $empleado = empleadoModelo::where('correoEmpleado',$correo)->first();
        if ($empleado && Hash::check($contrasena, $empleado->contrasenaEmpleado)){
            $token = JWTAuth::fromUser($empleado);
            $data=[
            'message'=>'Incio de sesion exitoso',
            'token'=> $token,
            'tipo'=> 'empleado',
            'cliente'=>$empleado,
            'status'=>200
            ];
            return response()->json($data,200);
        }

        
        return response()->json([
            'message' => 'Usuario no encontrado o credenciales incorrectas',
            'status' => 404
        ], 404);
    }
}