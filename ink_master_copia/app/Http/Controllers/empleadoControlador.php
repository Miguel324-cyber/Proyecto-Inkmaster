<?php

namespace App\Http\Controllers;

use App\Models\empleadoModelo;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class empleadoControlador extends Controller
{
    // Listar empleados
    public function listar()
    {
        $empleados = empleadoModelo::all();

        if ($empleados->isEmpty()) {
            return response()->json([
                'message' => 'No hay empleados registrados',
                'status' => 404
            ], 404);
        }

        return response()->json($empleados, 200);
    }

    // Agregar empleado
    public function agregar(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'nombreEmpleado' => 'required|min:2|max:20',
            'correoEmpleado' => 'required|email',
            'contrasenaEmpleado' => 'required|min:5|max:30',
            'telefonoEmpleado' => 'required|min:7|max:15',
            'idCargo' => 'required|numeric'
        ]);

        if ($validacion->fails()) {
            return response()->json([
                'message' => 'Error en la validación de datos',
                'errors' => $validacion->errors(),
                'status' => 400
            ], 400);
        }

        $empleado = empleadoModelo::create([
            'nombreEmpleado' => $request->nombreEmpleado,
            'correoEmpleado' => $request->correoEmpleado,
            'contrasenaEmpleado' => Hash::make($request->contrasenaEmpleado),
            'telefonoEmpleado' => $request->telefonoEmpleado,
            'idCargo' => $request->idCargo
        ]);

        return response()->json([
            'empleado' => $empleado,
            'status' => 201
        ], 201);
    }

    // Mostrar empleado por ID
    public function mostrar($idEmpleado)
    {
        $empleado = empleadoModelo::find($idEmpleado);

        if (!$empleado) {
            return response()->json([
                'message' => 'Empleado no encontrado',
                'status' => 404
            ], 404);
        }

        return response()->json($empleado, 200);
    }

    // Eliminar empleado
    public function eliminar($idEmpleado)
    {
        $empleado = empleadoModelo::find($idEmpleado);

        if (!$empleado) {
            return response()->json([
                'message' => 'Empleado no encontrado',
                'status' => 404
            ], 404);
        }

        $empleado->delete();

        return response()->json([
            'message' => 'Empleado eliminado exitosamente',
            'status' => 200
        ], 200);
    }

    // Modificar empleado
    public function modificar(Request $request, $idEmpleado)
    {
        $empleado = empleadoModelo::find($idEmpleado);

        if (!$empleado) {
            return response()->json([
                'message' => 'Empleado no encontrado',
                'status' => 404
            ], 404);
        }

        $validacion = Validator::make($request->all(), [
            'nombreEmpleado' => 'required|min:2|max:40',
            'correoEmpleado' => 'required|email|unique:empleado,correoEmpleado,' . $idEmpleado . ',idEmpleado',
            'telefonoEmpleado' => 'required|min:7|max:15',
            'contrasenaEmpleado' => 'nullable|min:5|max:20',
            'idCargo' => 'required|numeric'
        ]);

        if ($validacion->fails()) {
            return response()->json([
                'message' => 'Error en la validación de datos',
                'errors' => $validacion->errors(),
                'status' => 400
            ], 400);
        }

        $empleado->nombreEmpleado = $request->nombreEmpleado;
        $empleado->correoEmpleado = $request->correoEmpleado;
        $empleado->telefonoEmpleado = $request->telefonoEmpleado;
        $empleado->idCargo = $request->idCargo;

        if ($request->has('contrasenaEmpleado') && !empty($request->contrasenaEmpleado)) {
            $empleado->contrasenaEmpleado = Hash::make($request->contrasenaEmpleado);
        }

        $empleado->save();

        return response()->json([
            'message' => 'Empleado modificado exitosamente',
            'empleado' => $empleado,
            'status' => 200
        ], 200);
    }
}
