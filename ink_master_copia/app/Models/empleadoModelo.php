<?php

namespace App\Models;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleadoModelo extends Model implements JWTSubject
{
    use HasFactory;
    protected $table='empleado';
    public $timestamps=false;
    protected $primaryKey = 'idEmpleado';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'nombreEmpleado',
        'correoEmpleado',
        'contrasenaEmpleado',
        'telefonoEmpleado',
        'idCargo'
    ];

    public function getJWTIdentifier(){
        return $this-> getKey();
    }
    public function getJWTCustomClaims(){
        return[];
    }
}
